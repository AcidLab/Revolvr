<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Influencerskill extends Model
{
    use SoftDeletes;
    	protected $table="influencerskills";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
