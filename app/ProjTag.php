<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjTag extends Model
{
        protected $table='projtags';
        	use SoftDeletes;
}
