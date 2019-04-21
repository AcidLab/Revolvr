<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairColor;

class HairColorController extends Controller
{
    public function getHairColors()
    {
    	return HairColor::all(); 
    }
}