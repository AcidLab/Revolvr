<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
{
    public function getTags()
    {
    	$configs = Tag::all(); 
		$success['code'] = 200;
        $success['message'] = 'Succées';
        $success['config']=$configs;
        
        return response()->json($success); 
    }
}
