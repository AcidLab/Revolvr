<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    	use Notifiable,SoftDeletes;

    	protected $table="admins";

    	protected $dates=['deleted_at'];
    	public $timestamps = true;
        

        protected $fillable = [
            'name', 'email', 'password',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];

        public function instagram(){
            return $this->hasOne(Instagram::class, 'user_id', 'id');
        }
}
