<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media ;
use Redirect ; 
use View ; 

class MediasController extends Controller
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
        $view = View::make('settings.medias_index');
        $medias = Media::all();
        $view->medias = $medias ; 
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
        $route = route('medias.store');
        $title = "du média" ; 
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
        $media = new Media ; 
        $media->label = $request->input('label');
        $media->save();
        return Redirect::to(route('medias.index'));
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
        $media = Media::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('medias.update',$media->id);
        $title = "du média" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $media ; 
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
        $media = Media::find($id) ; 
        $media->label = $request->input('label');
        $media->save();
        return Redirect::to(route('medias.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMedia($id)
    {
        $media = Media::find($id);
        $media->delete();
        return Redirect::to(route('medias.index'));
    }
}
