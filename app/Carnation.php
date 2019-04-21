<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carnation extends Model
{
    use SoftDeletes;
	
    	protected $table="carnations";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
