<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use View;
use Redirect ; 
use Validator;
use Hash ; 

class AdvertisersController extends Controller
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
        $view = View::make('advertisers.index');
        $noAcceptedDemands= User::onlyTrashed()->get();
        $bannedDemands = User::onlyTrashed()->where('banned','=',1)->get();
        $inWait = User::onlyTrashed()->where('banned','=',null)->get();
        $acceptedDemands = User::all();
        $view->noAcceptedDemands = $inWait;
        $view->acceptedDemands = $acceptedDemands;
        $view->bannedDemands = $bannedDemands;
        return $view ; 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('advertisers.create');
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
        $rules = array('password' => 'required|string|min:6|confirmed','email' => 'required|string|email|max:255|unique:users');
        $v = Validator::make($request->all(),$rules);

        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }
        else {
            $user = new User ; 
            $user->name = $request->input('name');
            $user->fname = $request->input('fname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->position = $request->input('position');
            $user->societe = $request->input('society');
            $user->tva = $request->input('tva');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return Redirect::to(route('advertisers.index'));
        }
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
        $view = View::make('advertisers.edit');
        $advertiser = User::find($id);
        $view->advertiser = $advertiser ; 
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
        $advertiser =  User::find($id);
        if($request->input('email') == $advertiser->email)
            {$rules = array('email' => 'required|string|email|max:255');}
        else
        {$rules = array('email' => 'required|string|email|max:255|unique:users');}
        
        $v=Validator::make($request->all(),$rules);
        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }

        else {
            $advertiser->name = $request->input('name');
            $advertiser->fname = $request->input('fname');
            $advertiser->email = $request->input('email');
            $advertiser->phone = $request->input('phone');
            $advertiser->position = $request->input('position');
            $advertiser->societe = $request->input('society');
            $advertiser->tva = $request->input('tva');
            $advertiser->save();
            return Redirect::to(route('advertisers.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteAdvertiser ($id){
        $advertiser = User::find($id);
        $advertiser->delete();
        return Redirect::to(route('advertisers.index'));
    }

    public function bannAdvertiser ($id){

        $advertiser = User::find($id);
        $advertiser->deleted_at = date('Y-m-d');
        $advertiser->banned = 1 ;
        $advertiser->save();
        return Redirect::to(route('advertisers.index'));

    }

    public function recoverAdvertiser ($id){

        $advertiser = User::onlyTrashed()->where([['id','=',$id],['banned','=',1]])->get()[0];
        $advertiser->deleted_at = null;
        $advertiser->banned = null;
        $advertiser->remember_token = null;
        $advertiser->save();
        return Redirect::to(route('advertisers.index'));

    }

    public function acceptAdvertiser ($id) {
        $advertiser = User::onlyTrashed()->where('id','=',$id)->get()[0];
        $advertiser->deleted_at = null;
        $advertiser->remember_token = null;
        $advertiser->save();
        return Redirect::to(route('advertisers.index'));
    }
}
