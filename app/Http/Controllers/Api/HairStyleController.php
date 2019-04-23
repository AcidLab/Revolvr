<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairStyle;

class HairStyleController extends Controller
{
    public function getHairStyles()
    {
    	$configs = HairStyle::all(); 
		$success['code'] = 200;
        $success['message'] = 'Succées';
        $success['config']=$configs;
        
        return response()->json($success); 
    }
}