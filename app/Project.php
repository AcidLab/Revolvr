<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Projectinfluencer ;
use DateTime;
use App\Projhome;
use App\Projhairtype;
use App\Projhairlength;
use App\Projhaircolor;
use App\Projeyescolor;
use App\Projcut;
use App\Projcomplexion;
use App\Projclothscut;
use App\Projshoesize;


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

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function hairColors()
    {
            return $this->belongsToMany('App\HairColor')->orderBy('created_at','desc');
    }

    public function hairStyles()
    {
            return $this->belongsToMany('App\HairStyle')->orderBy('created_at','desc');
    }

    public function eyesColors()
    {
            return $this->belongsToMany('App\EyeColor')->orderBy('created_at','desc');
    }

    public function tags()
    {
            return $this->belongsToMany('App\Tag')->orderBy('created_at','desc');
    }

    public function skills()
    {
            return $this->belongsToMany('App\Skill')->orderBy('created_at','desc');
    }

    public function brands()
    {
            return $this->belongsToMany('App\Brand')->orderBy('created_at','desc');
    }

    public function foods()
    {
            return $this->belongsToMany('App\Food')->orderBy('created_at','desc');
    }

    public function medias()
    {
            return $this->belongsToMany('App\Media')->orderBy('created_at','desc');
    }

    public function influencers()
    {
            return $this->belongsToMany('App\Influencer')->orderBy('created_at','desc');
    }

    public function likes () {

        return $this->belongsToMany('App\Influencer')->orderBy('created_at','desc')->where('action_id', '=',1)->with('country')->with('city')->with('hairColor')->with('hairStyle')->with('eyeColor')->with('tags')->with('skills')->with('brands')->with('foods')->with('medias')->with('images');
    }

    public function dislikes () {

        return $this->belongsToMany('App\Influencer')->where('action_id', '=',0)->orderBy('created_at','desc');
    }

    public function like_dislike () {

        return $this->belongsToMany('App\Influencer')->orderBy('created_at','desc');
    }

   
    /*public function clothsCuts()
    {
            return $this->belongsToMany('App\Projclothscut','proj_id');
    }

    public function complexions()
    {
            return $this->belongsToMany('App\Projcomplexion','proj_id');
    }

    public function cuts()
    {
            return $this->belongsToMany('App\Projcut','proj_id');
    }

    public function homes()
    {
            return $this->belongsToMany('App\Projhome','proj_id');
    }
*/

}
