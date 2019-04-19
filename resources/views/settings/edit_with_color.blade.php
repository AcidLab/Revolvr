@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            	<form action="{{$route}}" method="POST">
            		<div class="form-body">
	                    <h3 class="card-title">Informations {{$title}}</h3>
	                    <hr>
	                    @csrf
	                    <input type="text" hidden name="_method" value="PUT" required />
	                    <div class="row">
	                    	<div class="col-md-6">
	                    		<div class="form-group">
	                    			<label class="control-label">Label</label>
	                    			<input type="text" class="form-control"  required name="label" placeholder="Label" value="{{old('label') ? old('label') : $object->label}}" />
                    				
	                    		</div>
	                    	</div>

	                    	<div class="col-md-6">
	                    		<div class="form-group">
	                    			<label class="control-label">Couleur</label>
	                    			<input type="color" class="form-control"  required name="color" placeholder="Couleur" value="{{old('color') ? old('color') : $object->color}}" />
                    				
	                    		</div>
	                    	</div>
	                    	
	                    	
	                    </div>
	                   
	                     
	                </div>
	                <div class="form-actions">
	                	<button type="submit" class="btn btn-primary"> <i class="fa fa-check"></i> Mettre à jour </button>
	                </div>
            	</form>
            </div>
        </div>
    </div>
</div>
@endsection