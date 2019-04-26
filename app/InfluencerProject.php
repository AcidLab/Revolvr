<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class InfluencerProject extends Model
{
    	protected $table="influencer_project";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;


}
