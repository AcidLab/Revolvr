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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
}
