<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountryController extends Controller
{
    public function getCountries()
	{
		$configs = Country::all(); 
		$success['code'] = 200;
        $success['message'] = 'Succées';
        $success['config']=$configs;
        
        return response()->json($success); 
	}
}
