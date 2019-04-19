<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
	use SoftDeletes;
	
    	protected $table="brands";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
