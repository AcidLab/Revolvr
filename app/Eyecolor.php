<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EyeColor extends Model
{
    use SoftDeletes;
	
    	protected $table="eyecolors";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
