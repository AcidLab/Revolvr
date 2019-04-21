<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;

class CityController extends Controller
{
    public function getCities()
	{
		return City::all(); 
	}
}