<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HairStyle;

class HairStyleController extends Controller
{
    public function getHairStyles()
    {
    	return HairStyle::all(); 
    }
}