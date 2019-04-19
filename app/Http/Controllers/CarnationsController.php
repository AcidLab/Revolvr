<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View ; 
use Redirect ; 
use App\Carnation ; 

class CarnationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $view = View::make('settings.withcolors_index');
        $carnations = Carnation::all();
        $view->tableOfObjects = $carnations;
        $create_route = route('carnations.create') ;
        $else = "Aucune carnation" ;
        $edit_route = "carnations.edit" ;
        $delete_route = "carnation.delete";
        $view->edit_route = $edit_route ; 
        $view->create_route = $create_route ;
        $view->delete_route = $delete_route ;
        $view ->else = $else ;  
        return $view ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('settings.create_with_color');
        $route = route('carnations.store');
        $title = "de la carnation" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        return $view ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carnation = new Carnation ; 
        $carnation->label = $request->input('label');
        $carnation->color = $request->input('color');
        $carnation->save();
        return Redirect::to(route('carnations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carnation = Carnation::find($id);
        $view = View::make('settings.edit_with_color');
        $route = route('carnations.update',$carnation->id);
        $title = "de la carnation" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $carnation ; 
        return $view ;
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
        $carnation = Carnation::find($id);
        $carnation->label = $request->input('label');
        $carnation->color = $request->input('color');
        $carnation->save();
        return Redirect::to(route('carnations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCarnation($id)
    {
        $carnation = Carnation::find($id) ; 
        $carnation->delete();
        return Redirect::to(route('carnations.index'));

    }
}
