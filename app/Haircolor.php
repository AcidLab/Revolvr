<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class HairColor extends Model
{
    use SoftDeletes;
	
    	protected $table="haircolors";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
