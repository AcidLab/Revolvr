<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Influencerbrand extends Model
{
    use SoftDeletes;
    	protected $table="influencerbrands";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
