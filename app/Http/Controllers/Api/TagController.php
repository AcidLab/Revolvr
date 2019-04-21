<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    public function getTags()
    {
    	return Tag::all();
    }
}
