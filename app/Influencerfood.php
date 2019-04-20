<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencerfood extends Model
{
    use SoftDeletes;
    	protected $table="influencerfoods";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
