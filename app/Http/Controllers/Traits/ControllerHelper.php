<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers\Traits;


trait ControllerHelper
{
    protected $results = [];
    protected $list = "List";
    protected $show = "Show";
    protected $edit = "Edit";
    protected $create = "Create";

    public function name(){
        if($this->model)
           return class_basename($this->model);
        return  null;
    }

}
