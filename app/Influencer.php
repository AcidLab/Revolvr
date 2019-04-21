<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Influencer extends Authenticatable
{
	use HasApiTokens,SoftDeletes;
    	protected $table="influencers";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;


    	protected $guard = 'influencer';


    	protected $fillable = [
        'name', 'fname','email', 'password','age', 'sexe','country','city','number_of_subscribers','commitement_rate','views_number_per_story','complexion','hair_color','hair_type','hair_length','eyes_color','clothes_cut','shoe_size','beauty','home' , 'address' ,'cut','phone',
    ];

}
