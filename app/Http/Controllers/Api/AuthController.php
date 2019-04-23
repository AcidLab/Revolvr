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
    use App\Influencerimage;
    use Auth;
    
    
    class AuthController extends Controller
    {
        
        
        
        
        
        
        public $successStatus = 200;
        
        
        
        
        public function login(Request $request)
        {
            $this->validate($request, [
                            'email'   => 'required|email',
                            'password' => 'required|min:6'
                            ]);
            
            $announcer = User::where('email',$request->email)->get();
            $influencer = Influencer::where('email',$request->email)->get();
            
            if (count($announcer)>0) {
                return $this->authUser('announcer',$request);
            }
            
            else if (count($influencer)>0) {
                
                return $this->authUser('influencer',$request);
            }
            
            else {
                
                $success['code'] = 302;
                $success['retour'] = 'Email introuvable';
                return response()->json($success);
                
            }
            
        }
        
        public function authUser ($guard,$request) {
            
            if(Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember')))
            {
                
                $user = Auth::guard($guard)->user();
                $success['code'] = 200;
                $success['retour'] = 'Login effectué avec succées';
                $success['token'] =  $user->createToken('revolver')->accessToken;
                $success['kind'] = $guard;
                $success['user']=$user;
                
                return response()->json($success);
            }
            else
            {
                $success['code'] = 301;
                $success['retour'] = 'Mot de passe erroné';
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

             if (!$input['name'])
            {
             $retour['message']='le champ name est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['email'])
            {
             $retour['message']='le champ email est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['password'])
            {
             $retour['message']='le champ password est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['fname'])
            {
             $retour['message']='le champ fname est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['position'])
            {
             $retour['message']='le champ position est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['tva'])
            {
             $retour['message']='le champ tva est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['societe'])
            {
             $retour['message']='le champ societe est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['phone'])
            {
             $retour['message']='le champ phone est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['image'])
            {
             $retour['message']='le champ image est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            
            
            $user= User::create([
                                'name' => $input['name'],
                                'email' => $input['email'],
                                'password' => bcrypt($input['password']),
                                'fname' => $input['fname'],
                                'position' => $input['position'],
                                'tva' => $input['tva'],
                                'societe' => $input['societe'],
                                'phone' => $input['phone'],
                                'image' => $input['image'],
                                ]);
            
            
            
            
            while(!$user->id) {}
            
            
            $success=$user;
            $success['token'] =  $user->createToken('revolver')->accessToken;
            return response()->json(['success'=>$success], $this->successStatus);
        }
        
        public function registerInf(Request $request)
        {
            $rules = array('email' => 'required|string|email|max:255|unique:influencers',);
            $v = Validator::make($request->all(),$rules);
            if ($v->fails()) {
                
                $errors = array('error'=>'cet email est déjà utilisé ! ');
                return response()->json($errors,$this->successStatus);
                
                
            }
            $input = $request->all();


            if (!$input['name'])
            {
             $retour['message']='le champ name est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['email'])
            {
             $retour['message']='le champ email est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['password'])
            {
             $retour['message']='le champ password est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['fname'])
            {
             $retour['message']='le champ fname est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['age'])
            {
             $retour['message']='le champ age est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['sexe'])
            {
             $retour['message']='le champ sexe est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['country'])
            {
             $retour['message']='le champ country est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['city'])
            {
             $retour['message']='le champ city est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['number_of_subscribers'])
            {
             $retour['message']='le champ number_of_subscribers est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['commitement_rate'])
            {
             $retour['message']='le champ commitement_rate est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['views_number_per_story'])
            {
             $retour['message']='le champ views_number_per_story est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['complexion'])
            {
             $retour['message']='le champ complexion est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['hair_color'])
            {
             $retour['message']='le champ hair_color est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['hair_type'])
            {
             $retour['message']='le champ hair_type est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['hair_length'])
            {
             $retour['message']='le champ hair_length est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['eyes_color'])
            {
             $retour['message']='le champ eyes_color est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['cut'])
            {
             $retour['message']='le champ cut est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['clothes_cut'])
            {
             $retour['message']='le champ clothes_cut est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['shoe_size'])
            {
             $retour['message']='le champ shoe_size est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['beauty'])
            {
             $retour['message']='le champ beauty est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['home'])
            {
             $retour['message']='le champ home est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['address'])
            {
             $retour['message']='le champ address est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['phone'])
            {
             $retour['message']='le champ phone est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['tags'])
            {
             $retour['message']='le champ tags est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['skills'])
            {
             $retour['message']='le champ skills est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['permis'])
            {
             $retour['message']='le champ permis est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['medias'])
            {
             $retour['message']='le champ medias est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['brands'])
            {
             $retour['message']='le champ brands est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['friends'])
            {
             $retour['message']='le champ friends est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['foods'])
            {
             $retour['message']='le champ foods est vide';
             $retour['code']='300';
             return response()->json($retour);
            }
            if (!$input['animals'])
            {
             $retour['message']='le champ animals est vide';
             $retour['code']='300';

             return response()->json($retour);
            }
            if (!$input['images'])
            {
             $retour['message']='le champ images est vide';
             $retour['code']='300';
             return response()->json($retour);
            }

            
            
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


            //images

            $images = json_decode($request->input('images'));
            
            
            for($i=0; $i<count($images);$i++)
            {
                $s= new Influencerimage;
                $s->id_influencer=$inf->id;
                $s->image=$images[$i]->image;
                $s->save();
            }

            
            
            $success=$inf;
            $success['token'] =  $inf->createToken('revolver')->accessToken;
            return response()->json(['success'=>$success], $this->successStatus);
        }
        
    }
    
    
