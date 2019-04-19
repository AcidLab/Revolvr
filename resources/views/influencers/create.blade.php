@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            	<form action="{{route('influencers.store')}}" method="POST">
            		<div class="form-body">
	                    <h3 class="card-title">Informations de l'influenceur</h3>
	                    <hr>
	                    @csrf
	                    <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Nom</label>
	                    			<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required name="name" placeholder="Nom" value="{{old('name')}}" />
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
	                    			<input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" required name="fname" placeholder="Prénom" value="{{old('fname')}}" />
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
	                    			<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required name="email" value="{{old('email')}}" placeholder="Email" />
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
	                    			<input type="number" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" required name="age" value="{{old('age')}}" placeholder="Age" min="0" />
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
	                    				<option value="0" {{old('sexe') == 0 ? 'selected' : ''}}>Femme</option>
	                    				<option value="1" {{old('sexe') == 1 ? 'selected' : ''}}>Homme</option>
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
	                    			<input type="number" class="form-control {{ $errors->has('number_of_subscribers') ? ' is-invalid' : '' }}" required name="number_of_subscribers" value="{{old('number_of_subscribers')}}" placeholder="Nombre d'abonnés" min="0" />
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
	                    			<input type="text" name="country" required class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{old('country')}}" placeholder="Pays" />
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
	                    			<input type="text" name="city" required class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{old('city')}}" placeholder="Ville" />
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
	                    			<input type="text" name="address" required class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{old('address')}}" placeholder="Adresse" />
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
	                    			<select class="form-control {{ $errors->has('media') ? ' is-invalid' : '' }}" name="media" required>
	                    				@foreach($medias as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<select class="form-control {{ $errors->has('skills') ? ' is-invalid' : '' }}" name="skills" required >
	                    				@foreach($skills as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<input type="text" name="tags" required class="form-control {{ $errors->has('tags') ? ' is-invalid' : '' }}" value="{{old('tags')}}" placeholder="Tags" />
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
	                    			<input type="text" name="complexion" required class="form-control {{ $errors->has('complexion') ? ' is-invalid' : '' }}" value="{{old('complexion')}}" placeholder="Carnation" />
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
	                    			<input type="text" name="hair_color" required class="form-control {{ $errors->has('hair_color') ? ' is-invalid' : '' }}" value="{{old('hair_color')}}" placeholder="Couleur des cheveux" />
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
	                    			<input type="text" name="hair_type" required class="form-control {{ $errors->has('hair_type') ? ' is-invalid' : '' }}" value="{{old('hair_type')}}" placeholder="Type des cheveux" />
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
	                    			<label class="control-label">Longueure de cheveux</label>
	                    			<input type="text" name="hair_length" required class="form-control {{ $errors->has('hair_length') ? ' is-invalid' : '' }}" value="{{old('hair_length')}}" placeholder="Longueure des cheveux" />
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
	                    			<input type="text" name="eyes_color" required class="form-control {{ $errors->has('eyes_color') ? ' is-invalid' : '' }}" value="{{old('eyes_color')}}" placeholder="Couleur des yeux" />
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
	                    			<input type="text" name="cut" required class="form-control {{ $errors->has('cut') ? ' is-invalid' : '' }}" value="{{old('cut')}}" placeholder="Taille" />
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
	                    			<input type="text" name="clothes_cut" required class="form-control {{ $errors->has('clothes_cut') ? ' is-invalid' : '' }}" value="{{old('clothes_cut')}}" placeholder="Taille" />
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
	                    			<input type="text" name="shoe_size" required class="form-control {{ $errors->has('shoe_size') ? ' is-invalid' : '' }}" value="{{old('shoe_size')}}" placeholder="Pointure" />
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
	                    			<input type="text" name="animals" required class="form-control {{ $errors->has('animals') ? ' is-invalid' : '' }}" value="{{old('animals')}}" placeholder="Animeaux domestiques" />
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
	                    			<input type="text" name="food" required class="form-control {{ $errors->has('food') ? ' is-invalid' : '' }}" value="{{old('food')}}" placeholder="Food" />
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
	                    			<input type="text" name="driving_license" required class="form-control {{ $errors->has('driving_license') ? ' is-invalid' : '' }}" value="{{old('driving_license')}}" placeholder="Permis" />
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
	                    			<input type="text" name="beauty" required class="form-control {{ $errors->has('beauty') ? ' is-invalid' : '' }}" value="{{old('beauty')}}" placeholder="Beauté" />
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
	                    			<input type="text" name="home" required class="form-control {{ $errors->has('home') ? ' is-invalid' : '' }}" value="{{old('home')}}" placeholder="Maison" />
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
	                    			<input type="text" name="friends" required class="form-control {{ $errors->has('friends') ? ' is-invalid' : '' }}" value="{{old('friends')}}" placeholder="Friends" />
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
	                    			<input type="text" name="love_brand" required class="form-control {{ $errors->has('love_brand') ? ' is-invalid' : '' }}" value="{{old('love_brand')}}" placeholder="Love brand" />
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
	                    			<input type="number" name="commitement_rate" required class="form-control {{ $errors->has('commitement_rate') ? ' is-invalid' : '' }}" value="{{old('commitement_rate')}}" min="0" placeholder="Taux d'engagement" />
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
	                    			<input type="number" name="phone" required class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{old('phone')}}" min="0" placeholder="Téléphone" />
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
	                    			<input type="number" name="views_number_per_story" required class="form-control {{ $errors->has('views_number_per_story') ? ' is-invalid' : '' }}" value="{{old('views_number_per_story')}}" min="0" placeholder="Nombre de vues par story" />
	                    			@if($errors->has('views_number_per_story'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('views_number_per_story') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    	
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-6">
	                    		<div class="form-group">
                                    			<label>Mot de passe : </label>
                                                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Mot de passe" name="password" required>
                                                    
                                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <p style="color: red;font-size: 12px;">{{ $errors->first('password') }}</p>
                                    </span>
                                @endif

                                    		</div>
	                    	</div>
	                    	<div class="col-md-6">
	                    		<div class="form-group">
                                    			<label>Confirmer le mot de passe :</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>

                                    		</div>
	                    	</div>
	                    	
	                    </div>
	                     
	                </div>
	                <div class="form-actions">
	                	<button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Ajouter</button>
	                </div>
            	</form>
            </div>
        </div>
    </div>
</div>
@endsection