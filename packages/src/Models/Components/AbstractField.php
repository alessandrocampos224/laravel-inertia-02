<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models\Components;


use Call\Models\Components\Traits\AttributesColumn;
use Call\Models\Components\Traits\HasComponents;
use Call\Models\Components\Traits\HiddenColumn;
use Call\Models\Components\Traits\OptionsColumn;

class AbstractField
{
    use HiddenColumn, OptionsColumn, AttributesColumn, HasComponents;
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

    /**
     * @param $text
     *
     * @return self
     */
    public function text($text): self
    {
        return $this->setAttribute('text', $text);
    }

    /**
     * @param $label
     *
     * @return self
     */
    public function label($label): self
    {
        return $this->setAttribute('label', $label);
    }

    /**
     * @param $pack
     *
     * @return self
     */
    public function pack($pack): self
    {
        return $this->setAttribute('pack', $pack);
    }

    /**
     * @param $color
     *
     * @return self
     */
    public function color($color): self
    {
        return $this->setAttribute('color', $color);
    }

    /**
     * @param $size
     *
     * @return self
     */
    public function size($size): self
    {
        return $this->setAttribute('size', $size);
    }

    /**
     * @param $class
     *
     * @return $this
     */
    public function class($class): self
    {
        return $this->setAttribute('class', $class);
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function id($id): self
    {
        return $this->setAttribute('id', $id);
    }

    /**
     * @param $icon
     *
     * @return $this
     */
    public function icon($icon): self
    {
        return $this->setAttribute('icon', $icon);
    }


    public function __get($name)
    {
        return $this->{$name};
    }

    public function __set($name, $value)
    {
        return $this->{$name} = $value;
    }
}
