<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Influencer;
use View;
use Redirect ; 
use Validator;
use Hash ;

class InfluencersController extends Controller
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
        $view = View::make('influencers.index');
        $noAcceptedDemands= Influencer::onlyTrashed()->get();
        $bannedDemands = Influencer::onlyTrashed()->where('banned','=',1)->get();
        $inWait = Influencer::onlyTrashed()->where('banned','=',null)->get();
        $acceptedDemands = Influencer::all();
        $view->noAcceptedDemands = $inWait;
        $view->acceptedDemands = $acceptedDemands;
        $view->bannedDemands = $bannedDemands;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view = View::make('influencers.create');
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
        $rules = array('password' => 'required|string|min:6|confirmed','email' => 'required|string|email|max:255|unique:influencers');
        $v = Validator::make($request->all(),$rules);

        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }
        else {

            $influencer = new Influencer ; 
            $influencer->name = $request->input('name');
            $influencer->fname = $request->input('fname');
            $influencer->email = $request->input('email');
            $influencer->password = Hash::make($request->input('password'));
            $influencer->age = $request->input('age');
            $influencer->sexe = $request->input('sexe');
            $influencer->country = $request->input('country');
            $influencer->city = $request->input('city');
            $influencer->number_of_subscribers = $request->input('number_of_subscribers');
            $influencer->commitement_rate = $request->input('commitement_rate');
            $influencer->views_number_per_story = $request->input('views_number_per_story');
            $influencer->media = $request->input('media');
            $influencer->skills = $request->input('skills');
            $influencer->tags = $request->input('tags');
            $influencer->complexion = $request->input('complexion');
            $influencer->hair_color = $request->input('hair_color');
            $influencer->hair_type = $request->input('hair_type');
            $influencer->hair_length = $request->input('hair_length');
            $influencer->eyes_color = $request->input('eyes_color');
            $influencer->cut = $request->input('cut');
            $influencer->clothes_cut = $request->input('clothes_cut');
            $influencer->shoe_size = $request->input('shoe_size');
            $influencer->animals = $request->input('animals');
            $influencer->food = $request->input('food');
            $influencer->driving_license = $request->input('driving_license');
            $influencer->beauty = $request->input('beauty');
            $influencer->home = $request->input('home');
            $influencer->friends = $request->input('friends');
            $influencer->love_brand = $request->input('love_brand');
            $influencer->address = $request->input('address');
            $influencer->phone = $request->input('phone');
            $influencer->save();
            return Redirect::to(route('influencers.index'));


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
        $influencer = Influencer::find($id);
        $view = View::make('influencers.edit');
        $view->influencer = $influencer;
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
        $influencer =  Influencer::find($id);
        if($request->input('email') == $influencer->email)
            {$rules = array('email' => 'required|string|email|max:255');}
        else
        {$rules = array('email' => 'required|string|email|max:255|unique:influencers');}
        
        $v=Validator::make($request->all(),$rules);
        if ($v->fails()) {

            return Redirect::back()->withInput()->withErrors($v);
            
        }
        else {
            $influencer->name = $request->input('name');
            $influencer->fname = $request->input('fname');
            $influencer->email = $request->input('email');
            $influencer->password = Hash::make($request->input('password'));
            $influencer->age = $request->input('age');
            $influencer->sexe = $request->input('sexe');
            $influencer->country = $request->input('country');
            $influencer->city = $request->input('city');
            $influencer->number_of_subscribers = $request->input('number_of_subscribers');
            $influencer->commitement_rate = $request->input('commitement_rate');
            $influencer->views_number_per_story = $request->input('views_number_per_story');
            $influencer->media = $request->input('media');
            $influencer->skills = $request->input('skills');
            $influencer->tags = $request->input('tags');
            $influencer->complexion = $request->input('complexion');
            $influencer->hair_color = $request->input('hair_color');
            $influencer->hair_type = $request->input('hair_type');
            $influencer->hair_length = $request->input('hair_length');
            $influencer->eyes_color = $request->input('eyes_color');
            $influencer->cut = $request->input('cut');
            $influencer->clothes_cut = $request->input('clothes_cut');
            $influencer->shoe_size = $request->input('shoe_size');
            $influencer->animals = $request->input('animals');
            $influencer->food = $request->input('food');
            $influencer->driving_license = $request->input('driving_license');
            $influencer->beauty = $request->input('beauty');
            $influencer->home = $request->input('home');
            $influencer->friends = $request->input('friends');
            $influencer->love_brand = $request->input('love_brand');
            $influencer->address = $request->input('address');
            $influencer->phone = $request->input('phone');
            $influencer->save();
            return Redirect::to(route('influencers.index'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteInfluencer($id)
    {
        $influencer = Influencer::find($id);
        $influencer->delete();
        return Redirect::to(route('influencers.index'));
    }

    public function bannInfluencer($id){
        $influencer = Influencer::find($id);
        $influencer->deleted_at = date('Y-m-d');
        $influencer->banned = 1 ;
        $influencer->save();
        return Redirect::to(route('influencers.index'));
    }

    public function acceptInfluencer($id){
        $influencer = Influencer::onlyTrashed()->where('id','=',$id)->get()[0];
        $influencer->deleted_at = null;
        $influencer->remember_token = null;
        $influencer->save();
        return Redirect::to(route('influencers.index'));
    } 

    public function recoverInfluencer($id){

        $influencer = Influencer::onlyTrashed()->where([['id','=',$id],['banned','=',1]])->get()[0];
        $influencer->deleted_at = null;
        $influencer->banned = null;
        $influencer->remember_token = null;
        $influencer->save();
        return Redirect::to(route('influencers.index'));
    }  
}
