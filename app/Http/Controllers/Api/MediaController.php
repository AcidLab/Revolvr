<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;

class MediaController extends Controller
{
    public function getMedias()
    {
    	return Media::all(); 
    }
}
