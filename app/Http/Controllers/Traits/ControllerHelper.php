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
    protected $template = "Dashboard";

    public function name(){
        if($this->model)
           return class_basename($this->model);
        return  $this->template;
    }

}
