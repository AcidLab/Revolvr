<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag ;
use Redirect ; 
use View ; 

class TagsController extends Controller
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
        $view = View::make('settings.tags_index');
        $tags = Tag::all();
        $view->tags = $tags ; 
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
        $route = route('tags.store');
        $title = "du tag" ; 
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
        $tag = new Tag ; 
        $tag->label = $request->input('label');
        $tag->save();
        return Redirect::to(route('tags.index'));
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
        $tag = Tag::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('tags.update',$tag->id);
        $title = "du tag" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $tag ; 
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
        $tag = Tag::find($id);
        $tag->label = $request->input('label');
        $tag->save();
        return Redirect::to(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return Redirect::to(route('tags.index'));
    }
}
