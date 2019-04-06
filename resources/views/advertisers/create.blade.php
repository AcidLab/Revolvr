@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('advertisers.store')}}" method="POST">
                <div class="form-body">
                    <h3 class="card-title">Informations de l'annonceur</h3>
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
                    	<div class="col-md-3">
                    		<div class="form-group">
                    			<label class="control-label">Téléphone</label>
                    			<input type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" required name="phone" min="0" placeholder="Téléphone" value="{{old('phone')}}" />
                    			@if($errors->has('phone'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('phone') }}</strong>
                                                 </span>
                                                @endif
                    		</div>
                    	</div>
                    	<div class="col-md-3">
                    		<div class="form-group">
                    			<label class="control-label">Position</label>
                    			<input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" required name="position"  placeholder="Position" value="{{old('position')}}" />
                    			@if($errors->has('position'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('position') }}</strong>
                                                 </span>
                                                @endif
                    		</div>
                    	</div>
                    	<div class="col-md-3">
                    		<div class="form-group">
                    			<label class="control-label">Société</label>
                    			<input type="text" class="form-control {{ $errors->has('society') ? ' is-invalid' : '' }}" required name="society"  placeholder="Société" value="{{old('society')}}" />
                    			@if($errors->has('society'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('society') }}</strong>
                                                 </span>
                                                @endif
                    		</div>
                    	</div>
                    	<div class="col-md-3">
                    		<div class="form-group">
                    			<label class="control-label">TVA</label>
                    			<input type="text" class="form-control {{ $errors->has('tva') ? ' is-invalid' : '' }}" required name="tva" value="{{old('tva')}}"  placeholder="TVA" />
                    			@if($errors->has('tva'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('tva') }}</strong>
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