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

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function hairColor()
    {
            return $this->belongsTo('App\HairColor');
    }

    public function hairStyle()
    {
            return $this->belongsTo('App\HairStyle');
    }

    public function eyeColor()
    {
            return $this->belongsTo('App\EyeColor');
    }

    public function tags()
    {
            return $this->belongsToMany('App\Tag');
    }

    public function skills()
    {
            return $this->belongsToMany('App\Skill');
    }

    public function brands()
    {
            return $this->belongsToMany('App\Brand');
    }

    public function foods()
    {
            return $this->belongsToMany('App\Food');
    }

    public function medias()
    {
            return $this->belongsToMany('App\Media');
    }

    public function images()
    {
            return $this->hasMany('App\Image');
    }

    public function image()
    {
            return $this->hasMany('App\Image')->where('profile_picture',1)->first();
    }

}
