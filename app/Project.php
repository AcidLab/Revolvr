<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Projectinfluencer ;
use DateTime;
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
    
    public function getTime()
    {
        return $this->time_elapsed_string($this->created_at);
    }
    
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        
        $string = array(
                        'y' => 'année',
                        'm' => 'mois',
                        'w' => 'semaine',
                        'd' => 'jour',
                        'h' => 'heure',
                        'i' => 'minute',
                        's' => 'seconde',
                        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                if ($v == 'mois') {
                    
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
                    
                }
                
                else {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                    
                }
                
            } else {
                unset($string[$k]);
            }
        }
        
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ' : 'maintenant';
    }
}
