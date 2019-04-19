<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Food extends Model
{
    use SoftDeletes;

    	protected $table="foods";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
