<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EyeColor;

class EyeColorController extends Controller
{
	public function getEyecolors()
	{
		return EyeColor::all(); 
	}
}
