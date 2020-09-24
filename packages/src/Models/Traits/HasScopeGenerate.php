<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait HasScopeGenerate
{
    /**
     * set auto filter
     *
     * @param Builder $builder
     * @param Request $request
     * @param array $filters
     * @return void
     */
    public function scopeComponent(Builder $builder, Request $request, array $filters = [])
    {

        return $this->filter($builder, $request, $filters);
    }

    /**
     * set auto filter
     *
     * @param Builder $builder
     * @param Request $request
     * @param $id
     * @return void
     */
    public function scopeEditRecord(Builder $builder, Request $request, $id)
    {

        if ($this->getComponent()) {

            return app($this->getComponent(), compact('request','id'))->edit($builder);
        }

        return $builder->find($id);
    }
    /**
     * set auto filter
     *
     * @param Builder $builder
     * @param Request $request
     * @param $id
     * @return void
     */
    public function scopeNewRecord(Builder $builder, Request $request)
    {

        if ($this->getComponent()) {

            return app($this->getComponent(), compact('request'))->NewRecord($builder);
        }

        return $builder;
    }
}
