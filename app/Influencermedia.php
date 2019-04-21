<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencermedia extends Model
{
    use SoftDeletes;
    	protected $table="influencermedias";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
