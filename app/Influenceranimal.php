<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influenceranimal extends Model
{
    use SoftDeletes;
    	protected $table="influenceranimals";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
