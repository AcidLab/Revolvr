<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Influencermedia ;
use App\Influenceranimal ; 
use App\Influencerbrand ; 
use App\Influencerfood ; 
use App\Influencerskill ; 
use App\Influencertag ;  

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

    public function getMediasIds(){
    	return Influencermedia::select('media_id')->where('influencer_id','=',$this->id)->pluck('media_id');
    }

    public function getAnimalsIds(){
    	return Influenceranimal::select('animal_id')->where('influencer_id','=',$this->id)->pluck('animal_id');
    }

    public function getBrandsIds(){
    	return Influencerbrand::select('brand_id')->where('influencer_id','=',$this->id)->pluck('brand_id');
    }

    public function getTagsIds(){
    	return Influencertag::select('tag_id')->where('influencer_id','=',$this->id)->pluck('tag_id');
    }

    public function getSkillsIds(){
    	return Influencerskill::select('skill_id')->where('influencer_id','=',$this->id)->pluck('skill_id');
    }

    public function getFoodsIds(){
    	return Influencerfood::select('food_id')->where('influencer_id','=',$this->id)->pluck('food_id');
    }

}
