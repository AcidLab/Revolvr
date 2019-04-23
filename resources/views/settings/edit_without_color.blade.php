@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="m-b-0 text-white">Informations</h4>
            </div>
            <div class="card-body">
            	<form action="{{$route}}" method="POST" enctype="multipart/form-data">
            		<div class="form-body">
	                    <h3 class="card-title">Informations {{$title}}</h3>
	                    <hr>
	                    @csrf
	                    <input type="text" hidden name="_method" value="PUT" required />
	                    <div class="row">
	                    	@if(isset($withImage))
	                    	<div class="col-md-6">
	                    		<div class="form-group">
	                    			<label class="control-label">Label</label>
	                    			<input type="text" class="form-control"  required name="label" placeholder="Label" value="{{old('label') ? old('label') : $object->label}}" />
                    				
	                    		</div>
	                    	</div>
	                    	<div class="col-md-6">
	                    		<div class="form-group">
	                    			<label class="control-label">Image</label>
	                    			<input type="file" class="form-control"  required name="image" placeholder="" accept="image/*"  />
                    				
	                    		</div>
	                    	</div>
	                    	@else
	                    	<div class="col-md-12">
	                    		<div class="form-group">
	                    			<label class="control-label">Label</label>
	                    			<input type="text" class="form-control"  required name="label" placeholder="Label" value="{{old('label') ? old('label') : $object->label}}" />
                    				
	                    		</div>
	                    	</div>
	                    	@endif
	                    	
	                    	
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