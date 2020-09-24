<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call;
use Call\Routes\RouteServiceProvider;
use Call\Support\Acl\AclServiceProvider;
use Call\Traits\BladeCall;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class CallServiceProvider extends BaseServiceProvider
{
    use BladeCall;

    public function register()
    {
        $this->app->register(AclServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->singleton(ResponseFactory::class);
    }

    public function boot()
    {
        $this->registerViews();
        $this->registerBladeDirective();
        $this->registerRequestMacro();
        $this->registerRouterMacro();
        $this->registerMiddleware();
        $this->shareValidationErrors();
        $this->loadMigrations();
        $this->publishMigrations();
    }

    public function registerViews(){

          $this->loadViewsFrom(base_path('packages/resources/views'), 'call-views');
    }

    /**
     * Publish the migration files.
     *
     * @return void
     */
    protected function publishMigrations()
    {
        $this->publishes([
            base_path('/packages/databases/migrations/') => database_path('migrations'),
        ], 'call-migrations');
    }

    /**
     * Load our migration files.
     *
     * @return void
     */
    protected function loadMigrations()
    {
        $this->loadMigrationsFrom( base_path('/packages/databases/migrations'));
    }

}
