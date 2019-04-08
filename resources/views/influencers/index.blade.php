@extends('layouts.app')
@section('content')




<div class="row">
	<div class="col-md-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil actif</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profil en attente</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Profil banné</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
	</div>
	<div class="col-md-4">
	</div>
	<div class="col-md-4" style="text-align: center;">
		<a href="{{route('influencers.create')}}" class="btn btn-primary btn-icon-split" style="width:100%;">
                    
                    <span class="text">Ajouter un influenceur</span>
                  </a>
	</div>
</div>
<br/>
<br/>
<h1 class="h3 mb-0 text-gray-800">Influenceurs acceptés</h1>
@if(count($acceptedDemands)>0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            	<th style="text-align: center;">Identifiant</th>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">Prénom</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Téléphone</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($acceptedDemands as $row)
                                            	<tr>
                                            		<td style="text-align: center;"></td>
                                            		<td style="text-align: center;"></td>
                                            		<td style="text-align: center;"></td>
                                            		<td style="text-align: center;"></td>
                                            		<td style="text-align: center;"></td>
                                            		<td style="text-align: center;"></td>
                                            	</tr>
                                            @endforeach
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun influenceur accepté</center>
@endif
<br/>
<br/>
<h1 class="h3 mb-0 text-gray-800">Influenceurs en attentes</h1>
@if(count($noAcceptedDemands)>0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            	<th style="text-align: center;">Identifiant</th>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">Prénom</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Téléphone</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun influenceur en attente</center>
@endif
<br/>
<br/>
<h1 class="h3 mb-0 text-gray-800">Influenceurs bannés</h1>
@if(count($bannedDemands)>0)
<div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            	<th style="text-align: center;">Identifiant</th>
                                                <th style="text-align: center;">Nom</th>
                                                <th style="text-align: center;">Prénom</th>
                                                <th style="text-align: center;">Email</th>
                                                <th style="text-align: center;">Téléphone</th>
                                                <th style="text-align:center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun influenceur bloqué</center>
@endif
@endsection