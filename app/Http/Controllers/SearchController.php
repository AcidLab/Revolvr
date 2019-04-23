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

    public function prepareWhereArray($project){

        $whereArray = array();
        if($project->ville != null && $project->ville != ""){
            $whereArray[] = ['city','like','%'.$project->ville.'%'] ;
        }
        if($project->age != null && $project->age !=""){
            $whereArray[] = ['age','like','%'.$project->age.'%'];
        }
        if($project->nbr_folowers != null && $project->nbr_folowers != ""){
            $whereArray[] = ['number_of_subscribers','like','%'.$project->nbr_folowers.'%'];
        }
        if($project->engagement != null && $project->engagement != ""){
            $whereArray[] = ['commitement_rate','like','%'.$project->engagement.'%'];
        }

    }

    public function transformToIdsTable ($objectsArray){
        $idsArray = array();
        foreach ($objectsArray as $key => $value) {
            $idsArray[] = $value->id ; 
        }
        return $idsArray ; 

    }

    public function  transformToLabelsTable($objectsArray){
        $labelsArray = array();
        foreach ($objectsArray as $key => $value) {
            $labelsArray[] = $value->label ; 
        }
        return $labelsArray ;

    }

    public function searchInfluencers(Request $request){

        $limit = 100 ;
        $whereArray = array();
        $price_one_range = [$request->input('min_price_one'),$request->input('max_price_one')];
        $price_two_range = [$request->input('min_price_two'),$request->input('max_price_two')];
        $project = Project::find($request->input('project_id'));
        $whereArray = $this->prepareWhereArray($project);
        $project_influencers = Projectinfluencer::select('influencer_id')->where('project_id','=',$project->id)->pluck('influencer_id');
        $influencers_today = Projectinfluencer::select('influencer_id')->where([['project_id','=',$project->id],['created_at','>=',date('Y-m-d').' 00:00:00'],['created_at','<=',date('Y-m-d').' 23:59:59']])->pluck('influencer_id');
        $influencers = Influencer::where($whereArray)
        ->whereIn('complexion',$this->transformToIdsTable($project->complexions))
        ->whereIn('hair_color',$this->transformToIdsTable($project->hairColors))
        ->whereIn('hair_type',$this->transformToIdsTable($project->hairTypes))
        ->whereIn('hair_length',$this->transformToLabelsTable($project->hairLengths))
        ->whereIn('eyes_color',$this->transformToIdsTable($project->eyesColors))
        ->whereIn('cut',$this->transformToLabelsTable($project->cuts))
        ->whereIn('clothes_cut',$this->transformToLabelsTable($project->clothesCuts))
        ->whereIn('shoe_size',$this->transformToLabelsTable($project->shoeSizes))
        ->whereIn('home',$this->transformToLabelsTable($project->homes))
        ->whereIn('price_one',$price_one_range)
        ->whereIn('price_two',$price_two_range)
        ->whereNotIn('id',$project_influencers)
        ->limit($limit-count($influencers_today));

        

        
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
