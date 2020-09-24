<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models\Components;

use Illuminate\Support\Str;

class Column extends AbstractField
{

    public function __construct($text, $name = null)
    {
        $this->text = $text;
        $this->name = $name ?? Str::snake(Str::lower($text));
    }
    /**
     * @param  null  $text
     * @param  null  $attribute
     *
     * @return static
     */
    public static function make($text = null, $attribute = null)
    {
        $column = new static($text, $attribute);

        return $column;
    }

    public function toArray(){

        return [
            'type'                   =>$this->type,
            'text'                   =>$this->text,
            'name'                   =>$this->name,
            'icon'                   =>$this->icon,
            'searchable'             =>$this->searchable,
            'sortable'               =>$this->sortable,
            'hidden'                 =>$this->getHidden(),
            'html'                   =>$this->html,
            'options'                =>$this->options,
            'components'             =>$this->getComponents(),
            'formRenderFramework'    =>sprintf("FormRenderer%s", Str::title($this->type)),
            'cellRenderFramework'    =>sprintf("CellRenderer%s", Str::title($this->type)),
            'attributes'             =>$this->getAttributes(),
        ];
    }
}
