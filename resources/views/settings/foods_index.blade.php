@extends('layouts.app')
@section('content')
<div class="row">
	
    <div class="col-md-2 offset-md-10"  style="text-align: center;">
        <a href="{{route('foods.create')}}" class="btn btn-primary btn-icon-split" style="width:100%;">
                    
                    <span class="text">Créer</span>
                  </a>
    </div>
    </div>
     <div style="margin-top: 30px;">
     	@if(count($foods)>0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">Identifiant</th>
                                                <th style="text-align: center;">Label</th>
                                                <th style="text-align: center;">Date de création</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($foods as $row)
                                           		<tr>
                                               <td style="text-align: center;">{{str_pad($row->id, 6, '0' , STR_PAD_LEFT)}}</td>
                                              <td style="text-align: center;">{{$row->label}}</td>
                                              <td style="text-align: center;">{{date('d-m-Y',strtotime($row->created_at))}}</td>
                                              <td style="text-align: center;">
                                                 <a href="{{route('foods.edit',$row->id)}}" class="btn btn-primary btn-circle">
                                                           <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{route('food.delete',$row->id)}}" class="btn btn-danger btn-circle">
                                                           <i class="fas fa-trash"></i>
                                                        </a>
                                                        
                                              </td> 
                                              </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun food </center>
@endif
     </div>
@endsection