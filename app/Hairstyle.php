<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HairStyle extends Model
{
	use SoftDeletes;
	
    	protected $table="hairstyles";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
    
}
