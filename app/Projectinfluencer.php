<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Project ; 
use App\Influencer ;

class Projectinfluencer extends Model
{
		use SoftDeletes;
    	protected $table="projectinfluencers";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;

    	public function project(){
    		return $this->belongsTo('App\Project','project_id');
    	}

    	public function influencer(){
    		return $this->belongsTo('App\Influencer','influencer_id');
    	}
}
