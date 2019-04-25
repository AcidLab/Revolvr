<?php

namespace App\Http\Controllers\Api;
use App\Animal;
use App\Brand;
use App\Carnation;
use App\City;
use App\Country;
use App\Eyecolor;
use App\Food;
use App\Hairstyle;
use App\Haircolor;
use App\Media;
use App\Skill;
use App\Tag;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
     public function getAll(Request $request)
     {

     	$config = array();

     	$config['animals'] = Animal::all();
     	$config['brands'] = Brand::all();
     	$config['carnations'] = Carnation::all();
     	$config['cities'] = City::all();
     	$config['countries'] = Country::all();
     	$config['eyeColors'] = Eyecolor::all();
     	$config['foods'] = Food::all();
     	$config['hairColors'] = Haircolor::all();
     	$config['hairStyles'] = Hairstyle::all();
     	$config['media'] = Media::all();
     	$config['skill'] = Skill::all();
     	$config['tag'] = Tag::all();
		$config['code'] = 200;
		$config['message'] = 'get all config';
        
        return response()->json($config);

     	

     }
}
