@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-4">
	</div>
	<div class="col-md-4">
	</div>
	<div class="col-md-4" style="text-align: center;">
		<a href="{{route('advertisers.create')}}" class="btn btn-primary btn-icon-split" style="width:100%;">
                    
                    <span class="text">Ajouter un annonceur</span>
                  </a>
	</div>
</div>
<br/>
@if(count($advertisers)>0)
<div class="table-responsive table-bordered" style="border-radius:10px !important;">
                                    <table class="table table-striped ">
                                        <thead > 
                                            <tr>
                                            	<th style="text-align: center;">Identifiant</th>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">Prénom</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Téléphone</th>
                                                <th style="text-align: center;">Position</th>
                                                <th style="text-align: center;">Société</th>
                                                <th style="text-align: center;">TVA</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($advertisers as $row)
                                            	<tr>
                                            		<td style="text-align: center;">{{str_pad($row->id, 6, '0' , STR_PAD_LEFT)}}</td>
                                            		<td style="text-align: center;">{{$row->name}}</td>
                                            		<td style="text-align: center;">{{$row->fname}}</td>
                                            		<td style="text-align: center;">{{$row->email}}</td>
                                            		<td style="text-align: center;">{{$row->phone}}</td>
                                            		<td style="text-align: center;">{{$row->position}}</td>
                                            		<td style="text-align: center;">{{$row->societe}}</td>
                                            		<td style="text-align: center;">{{$row->tva}}</td>
                                            		<td style="text-align: center;">
                                            			<a href="{{route('advertisers.edit',$row->id)}}" class="btn btn-primary btn-circle">
										                   <i class="fas fa-edit"></i>
										                </a>
                                            			<a href="{{route('advertiser.delete',$row->id)}}" class="btn btn-danger btn-circle">
										                   <i class="fas fa-trash"></i>
										                </a>
                                            		</td>
                                            	</tr>
                                            @endforeach
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun annonceur trouvé</center>
@endif
@endsection