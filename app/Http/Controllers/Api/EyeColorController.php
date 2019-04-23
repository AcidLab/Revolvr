<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EyeColor;

class EyeColorController extends Controller
{
	public function getEyecolors()
	{
		$configs = EyeColor::all(); 
		$success['code'] = 200;
        $success['message'] = 'Succées';
        $success['config']=$configs;
        
        return response()->json($success); 
	}
}
