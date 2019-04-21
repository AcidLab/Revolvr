<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carnation;

class CarnationController extends Controller
{
    public function getCarnations()
	{
		return Carnation::all(); 
	}
}
