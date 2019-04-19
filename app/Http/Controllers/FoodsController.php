<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food ;
use Redirect ; 
use View ; 

class FoodsController extends Controller
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
        $view = View::make('settings.foods_index');
        $foods = Food::all();
        $view->foods = $foods; 
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
        $route = route('foods.store');
        $title = "du food" ; 
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
        $food = new Food ; 
        $food->label = $request->input('label');
        $food->save();
        return Redirect::to(route('foods.index'));
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
        $food = Food::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('foods.update',$food->id);
        $title = "du food" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $food ; 
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
        $food = Food::find($id);
        $food->label = $request->input('label');
        $food->save();
        return Redirect::to(route('foods.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFood($id)
    {
        $food = Food::find($id);
        $food->delete();
        return Redirect::to(route('foods.index'));
    }
}
