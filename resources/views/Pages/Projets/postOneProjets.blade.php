@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord / Listes des Projets</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Projets</a></li>
                    <li class="breadcrumb-item active">listes</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row cardM">

        <!-- div class="col-12">
            <div class="row">
                <div class="col-sm-8"> 
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
                </div>
                <div class="col-sm-1">
                    <a href="{{route('admin.projets.listes.index')}}" class="btn btn-block mt-2" title="actualiser la page"><i class="fas fa-sync"></i></a>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" data-toggle="modal" data-target="#modal-AjoutProjet">Ajout Projet</button>
                </div>
            </div>   
        </div -->

        <!-- table -->
        <div class="col-12">
            <div class="card" style="height: 50vh; padding-left: 10px;">
                <div class="card-header">
                    <h3 class="card-title">Information sur le Projet</h3>
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
                            <h5>Intitule Projet : <span>{{$postProjets->intituleProjet}}</span></h5>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <p class="card-text">Date debut Projet : <strong>{{ Carbon\Carbon::parse($postProjets->dateProjet)->format('d-m-Y') }}</strong></p>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <p class="card-text">Date fin Projet : <strong>{{ Carbon\Carbon::parse($postProjets->dateFinProjet)->format('d-m-Y') }}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Lieu execution Projet : <strong>{{$postProjets->lieuProjet}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Status Projet : <strong>{{$postProjets->status}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text" style="font-weight: bold">Liste des staffs affectés au projet: <strong><a href="{{route('admin.projets.post.listeAgentsAffecteAuProjet',[$postProjets->id])}}" title="click pour voir la liste des staff pour le projet">voir plus</a></strong></p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection