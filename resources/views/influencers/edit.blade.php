@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            	<form action="{{route('influencers.update',$influencer->id)}}" method="POST">
            		<div class="form-body">
	                    <h3 class="card-title">Informations de l'influenceur</h3>
	                    <hr>
	                    @csrf
	                    <input type="text" hidden name="_method" value="PUT" />
	                    <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Nom</label>
	                    			<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required name="name" placeholder="Nom" value="{{old('name') ? old('name') : $influencer->name}}" />
                    				@if($errors->has('name'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('name') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Prénom</label>
	                    			<input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" required name="fname" placeholder="Prénom" value="{{old('fname') ? old('fname') : $influencer->fname}}" />
                    				@if($errors->has('fname'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('fname') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Email</label>
	                    			<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required name="email" value="{{old('email') ? old('email') : $influencer->email}}" placeholder="Email" />
                    				@if($errors->has('email'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Age</label>
	                    			<input type="number" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" required name="age" value="{{old('age') ? old('age') : $influencer->age}}" placeholder="Age" min="0" />
                    				@if($errors->has('age'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('age') }}</strong>
                                                 </span>
                                                @endif

	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Sexe</label>
	                    			<select class="form-control {{ $errors->has('sexe') ? ' is-invalid' : '' }}" required name="sexe">
	                    				@if(old('sexe'))
	                    				<option value="0" {{old('sexe') == 0 ? 'selected' : ''}}>Femme</option>
	                    				<option value="1" {{old('sexe') == 1 ? 'selected' : ''}}>Homme</option>
	                    				@else
	                    				<option value="0" {{$influencer->sexe == 0 ? 'selected' : ''}}>Femme</option>
	                    				<option value="1" {{$influencer->sexe == 1 ? 'selected' : ''}}>Homme</option>
	                    				@endif
	                    			</select>
	                    			@if($errors->has('sexe'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('sexe') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Nombre d'abonnés </label>
	                    			<input type="number" class="form-control {{ $errors->has('number_of_subscribers') ? ' is-invalid' : '' }}" required name="number_of_subscribers" value="{{old('number_of_subscribers') ? old('number_of_subscribers') : $influencer->number_of_subscribers}}" placeholder="Nombre d'abonnés" min="0" />
                    				@if($errors->has('number_of_subscribers'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('number_of_subscribers') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Pays</label>
	                    			<input type="text" name="country" required class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{old('country') ? old('country') : $influencer->country}}" placeholder="Pays" />
	                    			@if($errors->has('country'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('country') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Ville</label>
	                    			<input type="text" name="city" required class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{old('city') ? old('city') : $influencer->city}}" placeholder="Ville" />
	                    			@if($errors->has('city'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('city') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Adresse</label>
	                    			<input type="text" name="address" required class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{old('address') ? old('address') : $influencer->address}}" placeholder="Adresse" />
	                    			@if($errors->has('address'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('address') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Media</label>
	                    			<input type="text" name="media" required class="form-control {{ $errors->has('media') ? ' is-invalid' : '' }}" value="{{old('media') ? old('media') : $influencer->media}}" placeholder="Media" />
	                    			@if($errors->has('media'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('media') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Skills</label>
	                    			<input type="text" name="skills" required class="form-control {{ $errors->has('skills') ? ' is-invalid' : '' }}" value="{{old('skills') ? old('skills') : $influencer->skills}}" placeholder="Skills" />
	                    			@if($errors->has('skills'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('skills') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Tags</label>
	                    			<input type="text" name="tags" required class="form-control {{ $errors->has('tags') ? ' is-invalid' : '' }}" value="{{old('tags') ? old('tags') : $influencer->tags}}" placeholder="Tags" />
	                    			@if($errors->has('tags'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('tags') }}</strong>
                                                 </span>
                                                @endif

	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Carnation</label>
	                    			<input type="text" name="complexion" required class="form-control {{ $errors->has('complexion') ? ' is-invalid' : '' }}" value="{{old('complexion') ? old('complexion') : $influencer->complexion}}" placeholder="Carnation" />
	                    			@if($errors->has('complexion'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('complexion') }}</strong>
                                                 </span>
                                                @endif

	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Couleur des cheveux</label>
	                    			<input type="text" name="hair_color" required class="form-control {{ $errors->has('hair_color') ? ' is-invalid' : '' }}" value="{{old('hair_color') ? old('hair_color') : $influencer->hair_color}}" placeholder="Couleur des cheveux" />
	                    			@if($errors->has('hair_color'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('hair_color') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Type des cheveux</label>
	                    			<input type="text" name="hair_type" required class="form-control {{ $errors->has('hair_type') ? ' is-invalid' : '' }}" value="{{old('hair_type') ? old('hair_type') : $influencer->hair_type}}" placeholder="Type des cheveux" />
	                    			@if($errors->has('hair_type'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('hair_type') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Longueure des cheveux</label>
	                    			<input type="text" name="hair_length" required class="form-control {{ $errors->has('hair_length') ? ' is-invalid' : '' }}" value="{{old('hair_length') ? old('hair_length') : $influencer->hair_length}}" placeholder="Longueure des cheveux" />
	                    			@if($errors->has('hair_length'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('hair_length') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Couleur des yeux</label>
	                    			<input type="text" name="eyes_color" required class="form-control {{ $errors->has('eyes_color') ? ' is-invalid' : '' }}" value="{{old('eyes_color') ? old('eyes_color') : $influencer->eyes_color}}" placeholder="Couleur des yeux" />
	                    			@if($errors->has('eyes_color'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('eyes_color') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Taille</label>
	                    			<input type="text" name="cut" required class="form-control {{ $errors->has('cut') ? ' is-invalid' : '' }}" value="{{old('cut') ? old('cut') : $influencer->cut}}" placeholder="Taille" />
	                    			@if($errors->has('cut'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('cut') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Taille des vêtements</label>
	                    			<input type="text" name="clothes_cut" required class="form-control {{ $errors->has('clothes_cut') ? ' is-invalid' : '' }}" value="{{old('clothes_cut') ? old('clothes_cut') : $influencer->clothes_cut}}" placeholder="Taille" />
	                    			@if($errors->has('clothes_cut'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('clothes_cut') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Pointure</label>
	                    			<input type="text" name="shoe_size" required class="form-control {{ $errors->has('shoe_size') ? ' is-invalid' : '' }}" value="{{old('shoe_size') ? old('shoe_size') : $influencer->shoe_size}}" placeholder="Pointure" />
	                    			@if($errors->has('shoe_size'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('shoe_size') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Animeaux domestiques</label>
	                    			<input type="text" name="animals" required class="form-control {{ $errors->has('animals') ? ' is-invalid' : '' }}" value="{{old('animals') ? old('animals') : $influencer->animals}}" placeholder="Animeaux domestiques" />
	                    			@if($errors->has('animals'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('animals') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-3">
	                    		<div class="form-group">
	                    			<label class="control-label">Food</label>
	                    			<input type="text" name="food" required class="form-control {{ $errors->has('food') ? ' is-invalid' : '' }}" value="{{old('food') ? old('food') : $influencer->food}}" placeholder="Food" />
	                    			@if($errors->has('food'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('food') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-3">
	                    		<div class="form-group">
	                    			<label class="control-label">Permis</label>
	                    			<input type="text" name="driving_license" required class="form-control {{ $errors->has('driving_license') ? ' is-invalid' : '' }}" value="{{old('driving_license') ? old('driving_license') : $influencer->driving_license}}" placeholder="Permis" />
	                    			@if($errors->has('driving_license'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('driving_license') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-3">
	                    		<div class="form-group">
	                    			<label class="control-label">Beauté</label>
	                    			<input type="text" name="beauty" required class="form-control {{ $errors->has('beauty') ? ' is-invalid' : '' }}" value="{{old('beauty') ? old('beauty') : $influencer->beauty}}" placeholder="Beauté" />
	                    			@if($errors->has('beauty'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('beauty') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-3">
	                    		<div class="form-group">
	                    			<label class="control-label">Maison</label>
	                    			<input type="text" name="home" required class="form-control {{ $errors->has('home') ? ' is-invalid' : '' }}" value="{{old('home') ? old('home') : $influencer->home}}" placeholder="Maison" />
	                    			@if($errors->has('home'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('home') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Friends</label>
	                    			<input type="text" name="friends" required class="form-control {{ $errors->has('friends') ? ' is-invalid' : '' }}" value="{{old('friends') ? old('friends') : $influencer->friends}}" placeholder="Friends" />
	                    			@if($errors->has('friends'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('friends') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Love brand</label>
	                    			<input type="text" name="love_brand" required class="form-control {{ $errors->has('love_brand') ? ' is-invalid' : '' }}" value="{{old('love_brand') ? old('love_brand') : $influencer->love_brand}}" placeholder="Love brand" />
	                    			@if($errors->has('love_brand'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('love_brand') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Taux d'engagement</label>
	                    			<input type="number" name="commitement_rate" required class="form-control {{ $errors->has('commitement_rate') ? ' is-invalid' : '' }}" value="{{old('commitement_rate') ? old('commitement_rate') : $influencer->commitement_rate}}" min="0" placeholder="Taux d'engagement" />
	                    			@if($errors->has('commitement_rate'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('commitement_rate') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-6">
	                    		<div class="form-group">
	                    			<label class="control-label">Téléphone</label>
	                    			<input type="number" name="phone" required class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{old('phone') ? old('phone') : $influencer->phone}}" min="0" placeholder="Téléphone" />
	                    			@if($errors->has('phone'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('phone') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>

	                    	</div>
	                    	<div class="col-md-6">
	                    		<div class="form-group">
	                    			<label class="control-label">Nombre de vues par story</label>
	                    			<input type="number" name="views_number_per_story" required class="form-control {{ $errors->has('views_number_per_story') ? ' is-invalid' : '' }}" value="{{old('views_number_per_story') ? old('views_number_per_story') : $influencer->views_number_per_story}}" min="0" placeholder="Nombre de vues par story" />
	                    			@if($errors->has('views_number_per_story'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('views_number_per_story') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	
	                    </div>
	                     
	                     
	                </div>
	                <div class="form-actions">
	                	<button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Mettre à jour</button>
	                </div>
            	</form>
            </div>
        </div>
    </div>
</div>
@endsection