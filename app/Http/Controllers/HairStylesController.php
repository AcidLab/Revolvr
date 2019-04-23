<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View ; 
use Redirect ; 
use App\Hairstyle ; 

class HairStylesController extends Controller
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
        $view = View::make('settings.hairstyles_index');
        $hairstyles = Hairstyle::all();
        $view->hairstyles = $hairstyles ; 
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
        $route = route('hairstyles.store');
        $title = "du style" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->withImage = true ; 
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
        $hairstyle = new Hairstyle ; 
        $hairstyle->label = $request->input('label');
        if($request->file('image')){

            $file = $request->file('image');
            $filename= $file->store(config('files.path'),'public');
            $hairstyle->image = asset($filename);
        }
        $hairstyle->save();
        return Redirect::to(route('hairstyles.index'));
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
        $hairstyle = Hairstyle::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('hairstyles.update',$hairstyle->id);
        $title = "du style" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $hairstyle ; 
        $view->withImage = true ; 
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
        $hairstyle = Hairstyle::find($id);
        $hairstyle->label = $request->input('label');
        if($request->file('image')){

            $file = $request->file('image');
            $filename= $file->store(config('files.path'),'public');
            $hairstyle->image = asset($filename);
        }
        $hairstyle->save();
        return Redirect::to(route('hairstyles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteHairStyle($id)
    {
        $hairstyle = Hairstyle::find($id);
        $hairstyle->delete();
        return Redirect::to(route('hairstyles.index'));
    }
}
