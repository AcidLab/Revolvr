<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Influencer;
use App\Influencerfood;
use App\Influencermedia;
use App\Influencerfriend;
use App\Influencertag;
use App\Influencerskill;
use App\Influencerbrand;
use App\Influenceranimal;
use App\Influencerpermi;
use Auth;


class AuthController extends Controller
{



    


    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:announcer')->except('logout');
        $this->middleware('guest:influencer')->except('logout');
    }


    public function userLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $announcer = User::where('email',$request->email)->get();
        $influencer = Influencer::where('email',$request->email)->get();

        if (count($announcer)>0) {
            $this->authUser('announcer');
        }

        else if (count($influencer)>0) {

            $this->authUser('influencer');
        }

        else {
            
            $success['code'] = 302;
            $success['message'] = 'Email introuvable';
            return response()->json($success);

        }
        
    }

    public function authUser ($guard) {

        if(Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember')))
        {

            $user = Auth::guard($guard)->user();
            $success['code'] = 200;
            $success['message'] = 'Login effectué avec succées';
            $success['token'] =  $user->createToken('revolver')->accessToken;
            $success['kind'] = $guard;
            $success['user']=$user;

            return response()->json($success);
        }
        else
        {
            $success['code'] = 301;
            $success['message'] = 'Mot de passe erroné';
            return response()->json($success);
        }

    }


    public function registerAnn(Request $request)
    {
        $rules = array('email' => 'required|string|email|max:255|unique:users',);
        $v = Validator::make($request->all(),$rules);
         if ($v->fails()) {
           
            $errors = array('error'=>'cet email est déjà utilisé ! ');
            return response()->json($errors,$this->successStatus);

            
        }
        $input = $request->all();
        
        
                    $user= User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'fname' => $input['fname'],
                    'position' => $input['position'],
                    'tva' => $input['tva'],
                    'societe' => $input['societe'],
                    'phone' => $input['phone'],
                    ]);
                

         

            while(!$user->id) {}
        
    
            $success=$user;
            $success['token'] =  $user->createToken('revolver')->accessToken;
            return response()->json(['success'=>$success], $this->successStatus);
    }

    public function registerInf(Request $request)
    {
        $rules = array('email' => 'required|string|email|max:255|unique:users',);
        $v = Validator::make($request->all(),$rules);
         if ($v->fails()) {
           
            $errors = array('error'=>'cet email est déjà utilisé ! ');
            return response()->json($errors,$this->successStatus);

            
        }
        $input = $request->all();
        
        
                    $inf= Influencer::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => bcrypt($input['password']),
                    'fname' => $input['fname'],
                    'age' => $input['age'],
                    'sexe' => $input['sexe'],
                    'country' => $input['country'],
                    'city' => $input['city'],
                    'number_of_subscribers' => $input['number_of_subscribers'],
                    'commitement_rate' => $input['commitement_rate'],
                    'views_number_per_story' => $input['views_number_per_story'],
                    'complexion' => $input['complexion'],
                    'hair_color' => $input['hair_color'],
                    'hair_type' => $input['hair_type'],
                    'hair_length' => $input['hair_length'],
                    'eyes_color' => $input['eyes_color'],
                    'cut' => $input['cut'],
                    'clothes_cut' => $input['clothes_cut'],
                    'shoe_size' => $input['shoe_size'],
                    'beauty' => $input['beauty'],
                    'home' => $input['home'],
                    'address' => $input['address'],
                    'phone' => $input['phone'],
                 
                    ]);
                

         

            while(!$inf->id) {}


            
            
            
            
            
         //tags  ok 
         $tags = json_decode($request->input('tags'));


        for($i=0; $i<count($tags);$i++)
        {
            $s= new Influencertag;
            $s->influencer_id=$inf->id;
            $s->tag_id=$tags[$i]->id;
            $s->save();
        }

        //competences ok
        $skills = json_decode($request->input('skills'));

        for($i=0; $i<count($skills);$i++)
        {
            $s= new Influencerskill;
            $s->influencer_id=$inf->id;
            $s->skill_id=$skills[$i]->id;
            $s->save();
        }


        //permis
        $permis = json_decode($request->input('permis'));

        for($i=0; $i<count($permis);$i++)
        {
            $s= new Influencerpermi;
            $s->influencer_id=$inf->id;
            $s->permis_id=$permis[$i]->id;
            $s->save();
        }


        //medias ok
        $medias = json_decode($request->input('medias'));

        for($i=0; $i<count($medias);$i++)
        {
            $s= new Influencermedia;
            $s->influencer_id=$inf->id;
            $s->media_id=$medias[$i]->id;
            $s->save();
        }


        //marques ok
        $brands = json_decode($request->input('brands'));

        for($i=0; $i<count($brands);$i++)
        {
            $s= new Influencerbrand;
            $s->influencer_id=$inf->id;
            $s->brand_id=$brands[$i]->id;
            $s->save();
        }


        //friends ok
        $friends = json_decode($request->input('friends'));

        for($i=0; $i<count($friends);$i++)
        {
            $s= new Influencerfriend;
            $s->influencer_id=$inf->id;
            $s->friend_id=$friends[$i]->id;
            $s->save();
        }



        //foods ok
        $foods = json_decode($request->input('foods'));

        for($i=0; $i<count($foods);$i++)
        {
            $s= new Influencerfood;
            $s->influencer_id=$inf->id;
            $s->food_id=$foods[$i]->id;
            $s->save();
        }


        //animals 

        $animals = json_decode($request->input('animals'));

        for($i=0; $i<count($animals);$i++)
        {
            $s= new Influenceranimal;
            $s->influencer_id=$inf->id;
            $s->animal_id=$animals[$i]->id;
            $s->save();
        }
        
    
            $success=$inf;
            $success['token'] =  $inf->createToken('revolver')->accessToken;
            return response()->json(['success'=>$success], $this->successStatus);
    }
    
}


