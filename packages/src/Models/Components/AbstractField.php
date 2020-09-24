<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models\Components;


use Call\Models\Components\Traits\HiddenColumn;
use Call\Models\Components\Traits\OptionsColumn;

class AbstractField
{
    use HiddenColumn, OptionsColumn;
    /**
     * @var
     */
    protected $type = 'text';

    /**
     * @var
     */
    protected $text;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var bool
     */
    protected $searchable=true;

    /**
     * @var bool
     */
    protected $sortable=false;

    /**
     * @var bool
     */
    protected $html=false;



    public function __get($name)
    {
        return $this->{$name};
    }

    public function __set($name, $value)
    {
        return $this->{$name} = $value;
    }
}
