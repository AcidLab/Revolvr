<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairColor;

class HairColorController extends Controller
{
    public function getHairColors()
    {
    	$configs = HairColor::all(); 
		$success['code'] = 200;
        $success['message'] = 'Succées';
        $success['config']=$configs;
        
        return response()->json($success); 
    }
}