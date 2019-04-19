<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Animal extends Model
{
    use SoftDeletes;

    	protected $table="animals";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;
}
