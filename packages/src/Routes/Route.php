<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Routes;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use JsonSerializable;
use ReflectionMethod;

class Route implements JsonSerializable
{
    protected $baseDomain;
    protected $basePort;
    protected $baseProtocol;
    protected $baseUrl;
    protected $group;
    protected $routes;

    public function __construct(string $group = null, string $url = null)
    {
        $this->group = $group;

        $this->baseUrl = Str::finish($url ?? url('/'), '/');

        tap(parse_url($this->baseUrl), function ($url) {
            $this->baseProtocol = $url['scheme'] ?? 'http';
            $this->baseDomain = $url['host'] ?? '';
            $this->basePort = $url['port'] ?? null;
        });

        $this->routes = $this->nameKeyedRoutes();
    }

    public function applyFilters($group)
    {
        if ($group) {
            return $this->group($group);
        }

        // return unfiltered routes if user set both config options.
        if (config()->has('call.except') && config()->has('call.only')) {
            return $this->routes;
        }

        if (config()->has('call.except')) {
            return $this->except();
        }

        if (config()->has('call.only')) {
            return $this->only();
        }

        return $this->routes;
    }

    /**
     * Filter routes by group.
     */
    public function group($group)
    {
        if (is_array($group)) {
            $filters = [];

            foreach ($group as $groupName) {
                $filters = array_merge($filters, config("call.groups.{$groupName}"));
            }

            return $this->filter($filters, true);
        }

        if (config()->has("call.groups.{$group}")) {
            return $this->filter(config("call.groups.{$group}"), true);
        }

        return $this->routes;
    }

    public function except()
    {
        return $this->filter(config('call.except'), false);
    }

    public function only()
    {
        return $this->filter(config('call.only'));
    }

    /**
     * Filter routes by name using the given patterns.
     */
    public function filter($filters = [], $include = true)
    {
        return $this->routes->filter(function ($route, $name) use ($filters, $include) {
            return Str::is(Arr::wrap($filters), $name) ? $include : ! $include;
        });
    }

    /**
     * Get a list of the application's named routes, keyed by their names.
     */
    protected function nameKeyedRoutes()
    {
        [$fallbacks, $routes] = collect(app('router')->getRoutes()->getRoutesByName())
            ->partition(function ($route) {
                return $route->isFallback;
            });

        $bindings = $this->resolveBindings($routes->toArray());

        return $routes->merge($fallbacks)
            ->map(function ($route) use ($bindings) {
                if ($this->isListedAs($route, 'except')) {
                    $this->appendRouteToList($route->getName(), 'except');
                } elseif ($this->isListedAs($route, 'only')) {
                    $this->appendRouteToList($route->getName(), 'only');
                }

                return collect($route)->only(['uri', 'methods'])
                    ->put('domain', $route->domain())
                    ->put('bindings', $bindings[$route->getName()] ?? [])
                    ->when($middleware = config('call.middleware'), function ($collection) use ($middleware, $route) {
                        if (is_array($middleware)) {
                            return $collection->put('middleware', collect($route->middleware())->intersect($middleware)->values()->all());
                        }

                        return $collection->put('middleware', $route->middleware());
                    })->filter();
            });
    }

    /**
     * Convert this Ziggy instance to an array.
     */
    public function toArray(): array
    {
        return [
            'baseUrl' => $this->baseUrl,
            'baseProtocol' => $this->baseProtocol,
            'baseDomain' => $this->baseDomain,
            'basePort' => $this->basePort,
            'defaultParameters' => method_exists(app('url'), 'getDefaultParameters')
                ? app('url')->getDefaultParameters()
                : [],
            'namedRoutes' => $this->applyFilters($this->group)->toArray(),
        ];
    }

    /**
     * Convert this Ziggy instance into something JSON serializable.
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Convert this Ziggy instance to JSON.
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Add the given route name to the current list of routes.
     */
    protected function appendRouteToList($name, $list)
    {
        config()->push("call.{$list}", $name);
    }

    /**
     * Check if the given route name is present in the given list.
     */
    protected function isListedAs($route, $list)
    {
        return (isset($route->listedAs) && $route->listedAs === $list)
            || Arr::get($route->getAction(), 'listed_as', null) === $list;
    }

    /**
     * Resolve route key names for any route parameters using Eloquent route model binding.
     */
    protected function resolveBindings(array $routes): array
    {
        $scopedBindings = method_exists(head($routes), 'bindingFields');

        foreach ($routes as $name => $route) {
            $bindings = [];

            foreach ($route->signatureParameters(UrlRoutable::class) as $parameter) {
                $model = $parameter->getType()->getName();
                $override = $model === (new ReflectionMethod($model, 'getRouteKeyName'))->class;

                // Avoid booting this model if it doesn't override the default route key name
                $bindings[$parameter->getName()] = $override ? app($model)->getRouteKeyName() : 'id';
            }

            $routes[$name] = $scopedBindings ? array_merge($bindings, $route->bindingFields()) : $bindings;
        }

        return $routes;
    }
}
