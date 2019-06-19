@extends('layouts.app')
@section('css-includes')


@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            	<form action="{{route('influencers.store')}}" method="POST" enctype="multipart/form-data">
            		<div class="form-body">
	                    <h3 class="card-title">Informations de l'influenceur</h3>
	                    <hr>
	                    @csrf
	                    <div class="row">
						<div class="col-md-12">
						<input id="input-id" class="file" data-preview-file-type="text" multiple type="file" accept="image/*" name="images[]" required>
						</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
								
	                    			<label class="control-label">Nom</label>
	                    			<input type="text" class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" required name="lname" placeholder="Nom" value="{{old('lname')}}" />
                    				@if($errors->has('lname'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('lname') }}</strong>
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

									<select class="form-control js-example-basic-single {{ $errors->has('country') ? ' is-invalid' : '' }}"  name="country" required >
	                    				@foreach($countries as $row)
	                    					
	                    						<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>

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
									<select class="form-control js-example-basic-single {{ $errors->has('city') ? ' is-invalid' : '' }}"  name="city" required >

									@foreach($cities as $row)
	                    					
	                    						<option value="{{$row->id}}">{{$row->departement_nom}}</option>
	                    				@endforeach
										</select>

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
	                    			<select class="js-example-basic-multiple form-control  {{ $errors->has('media') ? ' is-invalid' : '' }}" name="media[]"  multiple="multiple" required >
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
	                    			<select class="form-control js-example-basic-multiple {{ $errors->has('skills') ? ' is-invalid' : '' }}" multiple="multiple" name="skills[]" required >
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
	                    			<select class="form-control js-example-basic-multiple {{ $errors->has('tags') ? ' is-invalid' : '' }}" multiple="multiple" name="tags[]" required >
	                    				@foreach($tags as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<select class="form-control js-example-basic-single {{ $errors->has('complexion') ? ' is-invalid' : '' }}"  name="complexion" required >
	                    				@foreach($carnations as $row)
	                    					<option value="{{$row->id}}" {{old('complexion') == $row->id ? 'selected' : ''}}>{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<select class="form-control js-example-basic-single {{ $errors->has('hair_color') ? ' is-invalid' : '' }}" name="hair_color" required >
	                    				@foreach($haircolors as $row)
	                    					<option value="{{$row->id}}" {{old('hair_color') == $row->id ? 'selected' : ''}}>{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<select class="form-control js-example-basic-single {{ $errors->has('hair_type') ? ' is-invalid' : '' }}" name="hair_type" required >
	                    				@foreach($hairstyles as $row)
	                    					<option value="{{$row->id}}" {{old('hair_type') == $row->id ? 'selected' : ''}}>{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<label class="control-label">Couleur des yeux</label>
	                    			<select class="form-control js-example-basic-single {{ $errors->has('eyes_color') ? ' is-invalid' : '' }}" name="eyes_color" required >
	                    				@foreach($eyecolors as $row)
	                    					<option value="{{$row->id}}" {{old('eyes_color') == $row->id ? 'selected' : ''}}>{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<input type="text" name="height" required class="form-control {{ $errors->has('height') ? ' is-invalid' : '' }}" value="{{old('height')}}" placeholder="Taille" />
	                    			@if($errors->has('height'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('height') }}</strong>
                                                 </span>
                                                @endif
	                    		</div>
	                    	</div>
	                    </div>
	                     <div class="row">
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Taille des vêtements</label>

									<select class="form-control js-example-basic-single {{ $errors->has('size') ? ' is-invalid' : '' }}"  name="clothes_cut" required >
	                    				@foreach($sizes as $row)
	                    					
	                    						<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>

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
	                    			<select class="form-control js-example-basic-multiple {{ $errors->has('animals') ? ' is-invalid' : '' }}" multiple="multiple" name="animals[]" >
	                    				@foreach($animals as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    			<select class="form-control js-example-basic-multiple {{ $errors->has('food') ? ' is-invalid' : '' }}" name="food[]" multiple="multiple">
	                    				@foreach($foods as $row)
	                    					<option value="{{$row->id}}" >{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
									<select class="form-control js-example-basic-multiple {{ $errors->has('beauties') ? ' is-invalid' : '' }}" multiple="multiple" name="beauties[]" >
	                    				@foreach($beauties as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
									<select class="form-control js-example-basic-multiple {{ $errors->has('houses') ? ' is-invalid' : '' }}" multiple="multiple" name="houses[]" >
	                    				@foreach($houses as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
	                    			@if($errors->has('houses'))
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

									<select class="form-control js-example-basic-multiple {{ $errors->has('friends') ? ' is-invalid' : '' }}" multiple="multiple" name="friends[]" max="6>
	                    				@foreach($friends as $row)
	                    					<option value="{{$row->id}}">{{$row->fname}}&nbsp;{{$row->lname}}</option>
	                    				@endforeach
	                    			</select>

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
	                    			<select class="form-control js-example-basic-multiple {{ $errors->has('love_brand') ? ' is-invalid' : '' }}" name="love_brand[]" multiple="multiple">
	                    				@foreach($brands as $row)
	                    					<option value="{{$row->id}}">{{$row->label}}</option>
	                    				@endforeach
	                    			</select>
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
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">VIP</label>
	                    			<select class="form-control {{ $errors->has('vip') ? ' is-invalid' : '' }}" required name="vip">
	                    				<option value="0" {{old('vip') == 0 ? 'selected' : ''}}>Non</option>
	                    				<option value="1" {{old('vip') == 1 ? 'selected' : ''}}>Oui</option>
	                    			</select> 
	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Prix de discussion</label>
	                    			<input type="number" placeholder="Prix de discussion" required name="price_one" class="form-control" value="{{old('price_one')}}"/>
 	                    		</div>
	                    	</div>
	                    	<div class="col-md-4">
	                    		<div class="form-group">
	                    			<label class="control-label">Prix </label>
	                    			<input type="number" placeholder="Prix" required name="price_two" class="form-control" value="{{old('price_two')}}"/>
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
@section('js-includes')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
	//$('.js-example-basic-multiple').attr('data-placeholder','Tapez votre recherche');
    $('.js-example-basic-multiple').select2({
	    placeholder: "Tapez votre recherche",
	    allowClear: true
});
    $('.js-example-basic-single').select2();
});
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.3/js/locales/(lang).js"></script>
@endsection
