<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;

class CountryController extends Controller
{
    public function getCountries()
	{
		return Country::all(); 
	}
}
