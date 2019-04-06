@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            <form action="{{route('advertisers.update',$advertiser->id)}}" method="POST">
                <div class="form-body">
                    <h3 class="card-title">Informations de l'annonceur</h3>
                    <hr>
                    @csrf
                    <input type="text" hidden name="_method" value="PUT" />
                    <div class="row">
                    	<div class="col-md-4">
                    		<div class="form-group">
                    			<label class="control-label">Nom</label>
                    			<input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required name="name" placeholder="Nom" value="{{$advertiser->name}}" />
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
                    			<input type="text" class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" required name="fname" placeholder="Prénom" value="{{$advertiser->fname}}" />
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
                    			<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" required name="email" value="{{$advertiser->email}}" placeholder="Email" />
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
                    			<input type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" required name="phone" min="0" placeholder="Téléphone" value="{{$advertiser->phone}}" />
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
                    			<input type="text" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" required name="position"  placeholder="Position" value="{{$advertiser->position}}" />
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
                    			<input type="text" class="form-control {{ $errors->has('society') ? ' is-invalid' : '' }}" required name="society"  placeholder="Société" value="{{$advertiser->societe}}" />
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
                    			<input type="text" class="form-control {{ $errors->has('tva') ? ' is-invalid' : '' }}" required name="tva" value="{{$advertiser->tva}}"  placeholder="TVA" />
                    			@if($errors->has('tva'))
                                                 <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $errors->first('tva') }}</strong>
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