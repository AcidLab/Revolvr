<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect ;
use View ; 
use App\Haircolor ; 

class HairColorsController extends Controller
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
        $haircolors = Haircolor::all();
        $view->tableOfObjects = $haircolors;
        $create_route = route('haircolors.create') ;
        $else = "Aucune couleur de cheveux" ;
        $edit_route = "haircolors.edit" ;
        $delete_route = "haircolor.delete";
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
        $route = route('haircolors.store');
        $title = "de la couleur" ; 
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
        $haircolor = new Haircolor ; 
        $haircolor->label = $request->input('label');
        $haircolor->color = $request->input('color');
        $haircolor->save();
        return Redirect::to(route('haircolors.index'));
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
        $haircolor = Haircolor::find($id);
        $view = View::make('settings.edit_with_color');
        $route = route('haircolors.update',$haircolor->id);
        $title = "de la couleur" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $haircolor ; 
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
        $haircolor = Haircolor::find($id);
        $haircolor->label = $request->input('label');
        $haircolor->color = $request->input('color');
        $haircolor->save();
        return Redirect::to(route('haircolors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteHairColor($id)
    {
        $haircolor = Haircolor::find($id);
        $haircolor->delete();
        return Redirect::to(route('haircolors.index'));
    }
}
