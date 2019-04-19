<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Eyecolor ; 
use View ; 
use Redirect ; 
class EyeColorsController extends Controller
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
        $eyecolors = Eyecolor::all();
        $view->tableOfObjects = $eyecolors;
        $create_route = route('eyecolors.create') ;
        $else = "Aucune couleur d'oeil" ;
        $edit_route = "eyecolors.edit" ;
        $delete_route = "eyecolor.delete";
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
        $route = route('eyecolors.store');
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
        $eyecolor = new Eyecolor ; 
        $eyecolor->label = $request->input('label');
        $eyecolor->color = $request->input('color') ; 
        $eyecolor->save();
        return Redirect::to(route('eyecolors.index'));
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
        $eyecolor = Eyecolor::find($id);
        $view = View::make('settings.edit_with_color');
        $route = route('eyecolors.update',$eyecolor->id);
        $title = "de la couleur" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $eyecolor ; 
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
        $eyecolor = Eyecolor::find($id);
        $eyecolor->label = $request->input('label');
        $eyecolor->color = $request->input('color');
        $eyecolor->save();
        return Redirect::to(route('eyecolors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEyeColor($id)
    {
        $eyecolor = Eyecolor::find($id);
        $eyecolor->delete();
        return Redirect::to(route('eyecolors.index'));
    }
}
