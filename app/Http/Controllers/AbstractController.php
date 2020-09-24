<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ControllerHelper;
use Call\Facades\Call;
use Illuminate\Http\Request;

class AbstractController extends Controller
{

    use ControllerHelper;

    protected $model;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Call\Response
     */
    public function index(Request $request)
    {
        if($this->model){
            $this->results = app($this->model)->component($request);
        }

        return Call::render(sprintf("%s/Index",$this->name()),$this->results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Call\Response
     */
    public function create(Request $request)
    {
        return Call::render(sprintf("%s/Create",$this->template));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Call\Response
     */
    public function show(Request $request, $id)
    {
        return Call::render(sprintf("%s/Show",$this->template));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Call\Response
     */
    public function edit(Request $request, $id)
    {
        return Call::render(sprintf("%s/Index",$this->template));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
