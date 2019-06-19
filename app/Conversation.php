<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conversation extends Model
{
    use SoftDeletes;

    	protected $table="conversations";
    	protected $dates=['deleted_at'];
		public $timestamps = true;
		
		public function messages()
    {
            return $this->hasMany('App\Message');
    }
}
