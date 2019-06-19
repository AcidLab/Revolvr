<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Beauty extends Model
{

    	protected $table="beauties";
    	public $timestamps = true;
}
