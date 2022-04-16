@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord / Staff </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Staff</a></li>
                    <li class="breadcrumb-item active">listes</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row cardM">

        <div class="col-12">
            <div class="row">
                <!-- div class="col-sm-8"> 
                    <form action="{{route('admin.projets.searchProjet')}}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm btn-dangerM mt-2" style="widthM: 500px;">
                        <input type="text" name="intituleProjetSearch" id="intituleProjetSearch" class="form-control float-right" placeholder="Entrez nom projet" />
                        <div class="input-group-append btn-dangerM">
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    </form>
                </div -->
                <!-- div class="col-sm-1">
                    <a href="{{route('admin.projets.listes.index')}}" class="btn btn-block mt-2" title="actualiser la page"><i class="fas fa-sync"></i></a>
                </div -->
                <div class="col-sm-3">
                    <a href="{{route('admin.agents.post.listeCongeOneAgentPdf',[$IdAgent])}}" target="_blank" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2">Imprimer l'historique congés Agent</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{route('admin.agents.post.listeCongeEncoursOneAgentPdf',[$IdAgent])}}" target="_blank" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2">Imprimer les congés en cours</a>
                </div>
            </div>   
        </div>

        <!-- table -->
        <div class="col-12">
            <div class="card" style="heightM: 50vh; padding-left: 10px;">
                <div class="card-header">
                    <h3 class="card-title">Liste des congés</h3>
                    <!-- div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div -->
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div class="row">
                        <div class="col-sm-12 mt-2">
                            <h5>Identite: <span>{{$listeCongeAgent->nom}} {{$listeCongeAgent->postnom}} {{$listeCongeAgent->prenom}}</span></h5>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <!-- th>Numéro projet</th -->
                                        <th>Congé</th>
                                        <th>Nbr de jours prévus</th>
                                        <th>Congé Deja Pris</th>
                                        <th>Nbr Jour demandé</th>
                                        <th>Nbr Jour Restant(s)</th>
                                        <th>Date dernier Depart</th>
                                        <th>Date dernier Retour</th>
                                        <th>Observation</th>
                                    </tr>
                                </thead>
                                <!-- div id="show_all_projets_Search"></div -->
                                <h5 class="text-center">Congé</h5>
                                <tbody>
                                    @forelse($listeCongeAgent->conges as $item)
                                    <tr>
                                        <!-- td>{{$item->numeroProjet}}</td -->
                                        <td>{{$item->circonstanceConge}}</td>
                                        <td>{{$item->totalJourPrevueConge}}</td>
                                        <td>{{$item->congeDejaPris}}</td>
                                        <td>{{$item->nbrJrD}}</td>
                                        <td>{{$item->nbrJourR}}</td>  
                                        <td>{{ Carbon\Carbon::parse($item->dateDepart)->format('d-m-Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->dateRetour)->format('d-m-Y') }}</td>
                                        <td>{{$item->statusConge}}</td>
                                    </tr>
                                    @empty
                                        <h4 class="text-center bg-danger">Pas de congé pour</h4>
                                    @endforelse 
                                    <p class="bg-danger"></p>
                                </tbody>
                            </table>                         
                        </div>                        
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection