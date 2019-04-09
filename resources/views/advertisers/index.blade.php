@extends('layouts.app')
@section('content')
<div class="row">

    <div class="col-md-2 offset-md-10"  style="text-align: center;">
        <a href="{{route('advertisers.create')}}" class="btn btn-primary btn-icon-split" style="width:100%;">
                    
                    <span class="text">Créer</span>
                  </a>
    </div>
    </div>
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
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div style="margin-top: 30px;">
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
                                                <th style="text-align: center;">TVA</th>
                                                <th style="text-align: center;">Position</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($acceptedDemands as $row)
                                                <tr>
                                                    <td style="text-align: center;">{{str_pad($row->id, 6, '0' , STR_PAD_LEFT)}}</td>
                                                    <td style="text-align: center;">{{$row->name}}</td>
                                                    <td style="text-align: center;">{{$row->fname}}</td>
                                                    <td style="text-align: center;">{{$row->email}}</td>
                                                    <td style="text-align: center;">{{$row->phone}}</td>
                                                    <td style="text-align: center;">{{$row->tva}}</td>
                                                    <td style="text-align: center;">{{$row->position}}</td>
                                                    <td style="text-align: center;">
                                                        <a href="{{route('advertisers.edit',$row->id)}}" class="btn btn-primary btn-circle">
                                                           <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{route('advertiser.delete',$row->id)}}" class="btn btn-warning btn-circle">
                                                           <i class="fas fa-trash"></i>
                                                        </a>
                                                        <a href="{{route('advertiser.bann',$row->id)}}" class="btn btn-danger btn-circle">
                                                           <i class="fas fa-ban"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun annonceur accepté</center>
@endif
</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div style="margin-top: 30px;">
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
                                                <th style="text-align: center;">TVA</th>
                                                <th style="text-align: center;">Position</th>
                                                <th style="text-align: center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($noAcceptedDemands as $row)
                                                <tr>
                                                    <td style="text-align: center;">{{str_pad($row->id, 6, '0' , STR_PAD_LEFT)}}</td>
                                                    <td style="text-align: center;">{{$row->name}}</td>
                                                    <td style="text-align: center;">{{$row->fname}}</td>
                                                    <td style="text-align: center;">{{$row->email}}</td>
                                                    <td style="text-align: center;">{{$row->phone}}</td>
                                                    <td style="text-align: center;">{{$row->tva}}</td>
                                                    <td style="text-align: center;">{{$row->position}}</td>
                                                    <td style="text-align: center;">
                                                        <a href="{{route('advertiser.accept',$row->id)}}" class="btn btn-success btn-circle">
                                                           <i class="fas fa-check"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun annonceur en attente</center>
@endif
</div>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <div style="margin-top: 30px;">
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
                                                <th style="text-align: center;">TVA</th>
                                                <th style="text-align: center;">Position</th>
                                                <th style="text-align:center;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bannedDemands as $row)
                                                <tr>
                                                    <td style="text-align: center;">{{str_pad($row->id, 6, '0' , STR_PAD_LEFT)}}</td>
                                                    <td style="text-align: center;">{{$row->name}}</td>
                                                    <td style="text-align: center;">{{$row->fname}}</td>
                                                    <td style="text-align: center;">{{$row->email}}</td>
                                                    <td style="text-align: center;">{{$row->phone}}</td>
                                                    <td style="text-align: center;">{{$row->tva}}</td>
                                                    <td style="text-align: center;">{{$row->position}}</td>
                                                    <td style="text-align: center;">
                                                        <a href="{{route('advertiser.recover',$row->id)}}" class="btn btn-success btn-circle">
                                                           <i class="fas fa-check"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
</div>
@else 
<center>Aucun annonceur bloqué</center>
@endif
      </div>
  </div>
</div>
    </div>
    
</div>
    
@endsection