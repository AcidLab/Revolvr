<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Food;

class FoodController extends Controller
{
    public function getFoods()
    {
    	return Food::all(); 
    }
}
