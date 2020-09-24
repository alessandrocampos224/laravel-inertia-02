<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models\Components\Traits;


trait HiddenColumn
{

    protected $hidden = [
        'list'                   =>false,
        'show'                   =>false,
        'create'                 =>false,
        'edit'                   =>false,
    ];

    /**
     * @var string
     */
    public function list($hidden = true): self
    {
        return $this->hidden('list', $hidden);
    }

    /**
     * @var string
     */
    public function show($hidden = true): self
    {
        return $this->hidden('show', $hidden);
    }

    /**
     * @var string
     */
    public function create($hidden = true): self
    {
        return $this->hidden('create', $hidden);
    }

    /**
     * @var string
     */
    public function edit($hidden = true): self
    {
        return $this->hidden('edit', $hidden);
    }
    /**
     * @param $key
     * @param bool $hidden
     * @return HiddenColumn
     */
    public function hidden($key, $hidden=true): self
    {
        if(in_array($key, $this->hidden)){
            $this->hidden[$key] = $hidden;
        }
        return $this;
    }

    /**
     * @return bool[]
     */
    public function getHidden(): array
    {
        return $this->hidden;
    }
}
