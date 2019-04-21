<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Animal;

class AnimalController extends Controller
{
    public function getAnimals()
	{
		return Animal::all(); 
	}
}
