<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Influencer ; 
use App\Project ; 
use App\Projectinfluencer ; 
use DB ;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchInfluencers(Request $request){

        $limit = 100 ;
        $project = Project::find($request->input('project_id'));
        $project_influencers = Projectinfluencer::select('influencer_id')->where('project_id','=',$project->id)->pluck('influencer_id');
        $influencers_today = Projectinfluencer::select('influencer_id')->where([['project_id','=',$project->id],['created_at','>=',date('Y-m-d').' 00:00:00'],['created_at','<=',date('Y-m-d').' 23:59:59']])->pluck('influencer_id');
        $influencers = Influencer::whereNotIn('id',$project_influencers)->limit($limit-count($influencers_today))->get();

        
        return $influencers;

    }
    public function index()
    {
        //
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
