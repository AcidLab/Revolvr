<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal ;
use Redirect ; 
use View ; 

class AnimalsController extends Controller
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
        $view = View::make('settings.animals_index');
        $animals = Animal::all();
        $view->animals = $animals; 
        return $view ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('settings.create_without_color');
        $route = route('animals.store');
        $title = "de l'animal" ; 
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
        $animal = new Animal ; 
        $animal->label = $request->input('label');
        $animal->save();
        return Redirect::to(route('animals.index'));
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
        $animal = Animal::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('animals.update',$animal->id);
        $title = "de l'animal" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $animal ; 
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
        $animal = Animal::find($id);
        $animal->label = $request->input('label');
        $animal->save();
        return Redirect::to(route('animals.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAnimal($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return Redirect::to(route('animals.index'));
    }
}
