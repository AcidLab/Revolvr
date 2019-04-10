<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Projectinfluencer ;

class Project extends Model
{
        use SoftDeletes;

        protected $table="projects";
    	protected $dates=['deleted_at'];
    	public $timestamps = true;

    	public function projectinfluencers (){

    		$pi = Projectinfluencer::all();
    		$final = array();
    		foreach ($pi as $key => $value) {
    			if($value->project_id == $this->id){
    				$final[] = $value ; 
    			}
    		}
    		return $final ; 

    	}
}
