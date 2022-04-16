@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord / Listes des Staffs </h1>
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
                    <!-- button type="button" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" data-toggle="modal" data-target="#modal-AjoutProjet">imprimer Staff Projet</button -->
                    <a href="{{route('admin.projets.post.listeAgentsEncoursAffecteAuProjetPdf',[$IdProjet])}}" target="_blank" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" title="impression des tout les Staffs en cours lié au projet ici"><i class="fas fa-print"></i> Imprimer Projet Staffs En cours</a>
                </div>
                <div class="col-sm-3">
                    <!-- button type="button" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" data-toggle="modal" data-target="#modal-AjoutProjet">imprimer Staff Projet</button -->
                    <a href="{{route('admin.projets.impression.listeAgentsAffecteAuProjetQuiOnDesCongesPdf',[$IdProjet])}}" target="_blank" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" title="Impression des touts les Staffs de ces projet dont leurs Congé sont en cours ou terminé"><i class="fas fa-print"></i> Imprimer Projet Staffs Conge</a>
                </div>
            </div>   
        </div>

        <!-- table -->
        <div class="col-12">
            <div class="card" style="heightM: 50vh; padding-left: 10px;">
                <div class="card-header">
                    <h3 class="card-title">Liste des Staffs affectés au projet</h3>
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
                            <h5>Intitulé Projet : <span>{{$listeAgentsAffecteAuProjet->intituleProjet}}</span></h5>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p>Date fin projet : <span>{{ Carbon\Carbon::parse($listeAgentsAffecteAuProjet->dateFinProjet)->format('d-m-Y') }}</span></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p>Nombre de Homme dans le projet: <span class="font-weight-bold">{{$nbrHomme}}</span> </p>
                            <p>Nombre de Femme dans le projet: <span class="font-weight-bold">{{$nbrFemme}}</span> </p>
                        </div>
                        <div class="col-sm-12">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <!-- th>Numéro projet</th -->
                                        <th>Nom</th>
                                        <th>Postnom</th>
                                        <th>Prenom</th>
                                        <th>Sexe</th>
                                        <th>Fonction</th>
                                        <th>Status</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                    </tr>
                                </thead>
                                <!-- div id="show_all_projets_Search"></div -->
                                <h5 class="text-center">Staff</h5>
                                <tbody>
                                    @forelse($listeAgentsAffecteAuProjet->agents as $item)
                                    <tr>
                                        <!-- td>{{$item->numeroProjet}}</td -->
                                        <td>{{$item->nom}}</td>
                                        <td>{{$item->postnom}}</td>
                                        <td>{{$item->prenom}}</td>
                                        <td>{{$item->sexe}}</td>
                                        <td>{{$item->fonction}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{ Carbon\Carbon::parse($item->dateDebut)->format('d-m-Y') }}</td>  
                                        <td>{{ Carbon\Carbon::parse($item->dateFinPrevue)->format('d-m-Y') }}</td>
                                    </tr>
                                    @empty
                                        <h4 class="text-center bg-danger">Pas de Staff pour ce projet</h4>
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