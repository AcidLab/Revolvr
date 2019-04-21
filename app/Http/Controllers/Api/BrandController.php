<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public function getBrands()
	{
		return Brand::all(); 
	}
}
