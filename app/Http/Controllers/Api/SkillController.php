<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller
{
    public function getSkills()
    {
    	return Skill::all(); 
    }
}
