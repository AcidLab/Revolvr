<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill ;
use Redirect ; 
use View ; 

class SkillsController extends Controller
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
        $view = View::make('settings.skills_index');
        $skills = Skill::all();
        $view->skills = $skills ; 
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
        $route = route('skills.store');
        $title = "du skill" ; 
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
        $skill = new Skill ; 
        $skill->label = $request->input('label');
        $skill->save();
        return Redirect::to(route('skills.index'));
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
        $skill = Skill::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('skills.update',$skill->id);
        $title = "du skill" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $skill ; 
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
        $skill = Skill::find($id);
        $skill->label = $request->input('label');
        $skill->save();
        return Redirect::to(route('skills.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteSkill($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return Redirect::to(route('skills.index'));
    }
}
