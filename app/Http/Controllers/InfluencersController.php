<?php
    
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Influencer;
    use App\Media ;
    use App\Skill ;
    use App\Tag ;
    use App\Carnation ;
    use App\HairColor ;
    use App\HairStyle ;
    use App\EyeColor;
    use App\Animal;
    use App\Food ;
    use App\Brand;
    use App\Country ;
    use App\City;
    use App\Size;
    use App\Beauty;
    use App\House;
    use App\Image;
    use View;
    use Redirect ;
    use Validator;
    use Hash ;
    
    class InfluencersController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        
        public function __construct(){
            $this->middleware('auth');
        }
        public function index()
        {
            $view = View::make('influencers.index');
            $noAcceptedDemands= Influencer::onlyTrashed()->get();
            $bannedDemands = Influencer::onlyTrashed()->where('banned','=',1)->get();
            $inWait = Influencer::onlyTrashed()->where('banned','=',null)->get();
            $acceptedDemands = Influencer::all();
            $view->noAcceptedDemands = $inWait;
            $view->acceptedDemands = $acceptedDemands;
            $view->bannedDemands = $bannedDemands;
            return $view;
        }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $view = View::make('influencers.create');
            $view->medias = Media::all();
            $view->skills = Skill::all();
            $view->tags = Tag::all();
            $view->carnations = Carnation::all();
            $view->haircolors = HairColor::all();
            $view->hairstyles = HairStyle::all();
            $view->eyecolors =  EyeColor::all();
            $view->animals = Animal::all();
            $view->foods = Food::all();
            $view->brands = Brand::all();
            $view->sizes = Size::all();
            $view->countries = Country::all();
            $view->cities = City::all();
            $view->houses = House::all();
            $view->beauties = Beauty::all();
            $view->friends = Influencer::all();
            return $view ;
        }
        
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            

            $rules = array('password' => 'required|string|min:6','email' => 'required|string|email|max:255|unique:influencers');
            $v = Validator::make($request->all(),$rules);
            
            if ($v->fails()) {
                
                return Redirect::back()->withInput()->withErrors($v);
                
            }
            else {
                
                $influencer = new Influencer ;
                $influencer->lname = $request->input('lname');
                $influencer->fname = $request->input('fname');
                $influencer->email = $request->input('email');
                $influencer->password = Hash::make($request->input('password'));
                $influencer->age = $request->input('age');
                $influencer->sexe = $request->input('sexe');
                $influencer->country_id = $request->input('country');
                $influencer->city_id = $request->input('city');
                $influencer->number_of_subscribers = $request->input('number_of_subscribers');
                $influencer->commitement_rate = $request->input('commitement_rate');
                $influencer->views_number_per_story = $request->input('views_number_per_story');
                $influencer->carnation_id = $request->input('complexion');
                $influencer->hair_color_id = $request->input('hair_color');
                $influencer->hair_style_id = $request->input('hair_type');
                //$influencer->hair_length = $request->input('hair_length');
                $influencer->eye_color_id = $request->input('eyes_color');
                $influencer->height = $request->input('height');
                $influencer->size_id = $request->input('clothes_cut');
                $influencer->shoe_size = $request->input('shoe_size');
                $influencer->driving_license = $request->input('driving_license');
                //$influencer->beauty = $request->input('beauty');
                //$influencer->home = $request->input('home');
                //$influencer->friends = $request->input('friends');
                $influencer->address = $request->input('address');
                $influencer->phone = $request->input('phone');
                $influencer->vip = $request->input('vip');
                $influencer->price_one = $request->input('price_one');
                $influencer->price_two = $request->input('price_two');
                $influencer->save();

                $images = array();
                foreach ($request->file('images') as $image) {
                    $file = $image;
                    $filename= $file->store(config('files.path'),'public');
                    $images[] = asset($filename);
                }




                while(!$influencer){
                    
                }
                
                for($i=0;$i<count($request->input('media'));$i++){
                    $influencer->medias()->attach($request->input('media')[$i]);
                }
                
                for($i=0;$i<count($request->input('skills'));$i++){
                    $influencer->skills()->attach($request->input('skills')[$i]);
                }
                
                for($i=0;$i<count($request->input('tags'));$i++){
                    $influencer->tags()->attach($request->input('tags')[$i]);
                }

                if ($request->input('animals'))
                for($i=0;$i<count($request->input('animals'));$i++){
                    $influencer->animals()->attach($request->input('animals')[$i]);
                }

                if ($request->input('food'))
                for($i=0;$i<count($request->input('food'));$i++){
                    $influencer->foods()->attach($request->input('food')[$i]);
                }

                if ($request->input('love_brand'))
                for($i=0;$i<count($request->input('love_brand'));$i++){
                    $influencer->brands()->attach($request->input('love_brand')[$i]);
                }
                

                if ($request->input('houses'))
                for($i=0;$i<count($request->input('houses'));$i++){
                    $influencer->houses()->attach($request->input('houses')[$i]);
                }
                
                
                if ($request->input('beauties'))
                for($i=0;$i<count($request->input('beauties'));$i++){
                    $influencer->beauties()->attach($request->input('beauties')[$i]);
                }
                
                if ($request->input('friends'))
                for($i=0;$i<count($request->input('friends'));$i++){
                    $influencer->friends()->attach($request->input('friends')[$i]);
                }

                for($i=0;$i<count($images);$i++){
                    $img = new Image;
                    $img->influencer_id = $influencer->id;
                    $img->path = $images[$i];
                    $img->profile_picture = 0;
                    $img->save();
                }
                
                
                $influencer->save();
                
                
                return Redirect::to(route('influencers.index'));
                
                
            }
        }
        
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            
            $influencer = Influencer::find($id);
            $view = View::make('influencers.edit');
            $view->medias = Media::all();
            $view->skills = Skill::all();
            $view->tags = Tag::all();
            $view->carnations = Carnation::all();
            $view->haircolors = HairColor::all();
            $view->hairstyles = HairStyle::all();
            $view->eyecolors =  EyeColor::all();
            $view->animals = Animal::all();
            $view->foods = Food::all();
            $view->brands = Brand::all();
            $view->sizes = Size::all();
            $view->countries = Country::all();
            $view->cities = City::all();
            $view->houses = House::all();
            $view->beauties = Beauty::all();
            $view->friends = Influencer::all();
            $view->oldmedias = $influencer->medias()->get()->pluck('id')->toArray();
            $view->oldskills = $influencer->skills()->get()->pluck('id')->toArray();
            $view->oldtags = $influencer->tags()->get()->pluck('id')->toArray();
            $view->oldanimals = $influencer->animals()->get()->pluck('id')->toArray();
            $view->oldfoods = $influencer->foods()->get()->pluck('id')->toArray();
            $view->oldbeauties = $influencer->beauties()->get()->pluck('id')->toArray();
            $view->oldhouses = $influencer->houses()->get()->pluck('id')->toArray();
            $view->oldfriends = $influencer->friends()->get()->pluck('id')->toArray();
            $view->oldsbrands = $influencer->brands()->get()->pluck('id')->toArray();
            $view->influencer = $influencer;
            return $view ;
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $influencer =  Influencer::find($id);
            if($request->input('email') == $influencer->email)
            {$rules = array('email' => 'required|string|email|max:255');}
            else
            {$rules = array('email' => 'required|string|email|max:255|unique:influencers');}
            
            $v=Validator::make($request->all(),$rules);
            if ($v->fails()) {
                
                return Redirect::back()->withInput()->withErrors($v);
                
            }
            else {
                $influencer->lname = $request->input('lname');
                $influencer->fname = $request->input('fname');
                $influencer->email = $request->input('email');
                $influencer->password = Hash::make($request->input('password'));
                $influencer->age = $request->input('age');
                $influencer->sexe = $request->input('sexe');
                $influencer->country_id = $request->input('country');
                $influencer->city_id = $request->input('city');
                $influencer->number_of_subscribers = $request->input('number_of_subscribers');
                $influencer->commitement_rate = $request->input('commitement_rate');
                $influencer->views_number_per_story = $request->input('views_number_per_story');
                $influencer->carnation_id = $request->input('complexion');
                $influencer->hair_color_id = $request->input('hair_color');
                $influencer->hair_style_id = $request->input('hair_type');
                $influencer->eye_color_id = $request->input('eyes_color');
                $influencer->height = $request->input('height');
                $influencer->size_id = $request->input('clothes_cut');
                $influencer->shoe_size = $request->input('shoe_size');
                $influencer->driving_license = $request->input('driving_license');
                $influencer->address = $request->input('address');
                $influencer->phone = $request->input('phone');
                $influencer->vip = $request->input('vip');
                $influencer->price_one = $request->input('price_one');
                $influencer->price_two = $request->input('price_two');
                
                $influencer->save();
                while(!$influencer){
                    
                }
                
                for($i=0;$i<count($request->input('media'));$i++){
                    $influencer->medias()->attach($request->input('media')[$i]);
                }
                
                for($i=0;$i<count($request->input('skills'));$i++){
                    $influencer->skills()->attach($request->input('skills')[$i]);
                }
                
                for($i=0;$i<count($request->input('tags'));$i++){
                    $influencer->tags()->attach($request->input('tags')[$i]);
                }
                for($i=0;$i<count($request->input('animals'));$i++){
                    $influencer->animals()->attach($request->input('animals')[$i]);
                }
                for($i=0;$i<count($request->input('food'));$i++){
                    $influencer->foods()->attach($request->input('food')[$i]);
                }
                for($i=0;$i<count($request->input('love_brand'));$i++){
                    $influencer->brands()->attach($request->input('love_brand')[$i]);
                }
                
                for($i=0;$i<count($request->input('homes'));$i++){
                    $influencer->houses()->attach($request->input('houses')[$i]);
                }
                
                
                for($i=0;$i<count($request->input('beauties'));$i++){
                    $influencer->beauties()->attach($request->input('beauties')[$i]);
                }
                
                for($i=0;$i<count($request->input('friends'));$i++){
                    $influencer->friends()->attach($request->input('friends')[$i]);
                }
                
                
                $influencer->save();
                
                
                
                return Redirect::to(route('influencers.index'));
                
            }
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function deleteInfluencer($id)
        {
            $influencer = Influencer::find($id);
            $influencer->delete();
            return Redirect::to(route('influencers.index'));
        }
        
        public function bannInfluencer($id){
            $influencer = Influencer::find($id);
            $influencer->deleted_at = date('Y-m-d');
            $influencer->banned = 1 ;
            $influencer->save();
            return Redirect::to(route('influencers.index'));
        }
        
        public function acceptInfluencer($id){
            $influencer = Influencer::onlyTrashed()->where('id','=',$id)->get()[0];
            $influencer->deleted_at = null;
            $influencer->remember_token = null;
            $influencer->save();
            return Redirect::to(route('influencers.index'));
        }
        
        public function recoverInfluencer($id){
            
            $influencer = Influencer::onlyTrashed()->where([['id','=',$id],['banned','=',1]])->get()[0];
            $influencer->deleted_at = null;
            $influencer->banned = null;
            $influencer->remember_token = null;
            $influencer->save();
            return Redirect::to(route('influencers.index'));
        }
    }
