<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View; 
use Redirect ; 
use App\Brand ; 

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct (){
        $this->middleware('auth');
    }
    public function index()
    {
        $view = View::make('settings.brands_index');
        $brands = Brand::all();
        $view->brands = $brands; 
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
        $route = route('brands.store');
        $title = "de la marque" ; 
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
        $brand = new Brand ; 
        $brand->label = $request->input('label');
        if($request->file('image')){

            $file = $request->file('image');
            $filename= $file->store(config('files.path'),'public');
            $brand->image = asset($filename);
        }
        $brand->save();
        return Redirect::to(route('brands.index'));
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
        $brand = Brand::find($id);
        $view = View::make('settings.edit_without_color');
        $route = route('brands.update',$brand->id);
        $title = "de la marque" ; 
        $view->route = $route ; 
        $view->title = $title ; 
        $view->object = $brand ; 
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
        $brand = Brand::find($id);
        $brand->label = $request->input('label');
        if($request->file('image')){

            $file = $request->file('image');
            $filename= $file->store(config('files.path'),'public');
            $brand->image = asset($filename);
        }
        $brand->save();
        return Redirect::to(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return Redirect::to(route('brands.index'));
    }
}
