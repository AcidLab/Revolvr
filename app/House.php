<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class House extends Model
{

    	protected $table="houses";
    	public $timestamps = true;
}
