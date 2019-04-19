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
	                    <div class="row">
	                    	<div class="col-md-12">
	                    		<div class="form-group">
	                    			<label class="control-label">Label</label>
	                    			<input type="text" class="form-control"  required name="label" placeholder="Label" value="{{old('label')}}" />
                    				
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