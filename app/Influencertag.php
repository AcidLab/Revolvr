<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencertag extends Model
{
    use SoftDeletes;
    	protected $table="influencertags";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
