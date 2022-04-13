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
            <div class="card" style="heightM: 50vh; padding-left: 10px;">
                <div class="card-header">
                    <h3 class="card-title">Information sur l'Agent</h3>
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
                    <div class="Mcol-sm-2 btn-dangerM float-right">
                        <button type="button" class="btn btn-block btn-primaryM btnAdra text-light mb-2M mt-2M" data-toggle="modal" data-target="#modal-AjoutPieceJointe">Ajout des piéces jointes</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div class="row">
                        <div class="col-sm-4 mt-2">
                            <h5>Nom: <span>{{$postInfosAgent->nom}}</span></h5>
                        </div>
                        <div class="col-sm-4 mt-2">
                            <h5>Postnom: <span>{{$postInfosAgent->postnom}}</span></h5>
                        </div>
                        <div class="col-sm-4 mt-2">
                            <h5>Prenom: <span>{{$postInfosAgent->prenom}}</span></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Sexe: <strong>{{$postInfosAgent->sexe}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Telephone: <strong>{{$postInfosAgent->telephone}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Lieu de Naissance: <strong>{{$postInfosAgent->lieuNaissance}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Date Naissance: <strong>{{ Carbon\Carbon::parse($postInfosAgent->dateNaissance)->format('d-m-Y') }}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Etat Civil: <strong>{{$postInfosAgent->etatCivil}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Email: <strong>{{$postInfosAgent->email}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Num Carte Identite: <strong>{{$postInfosAgent->NumCarteIdentite}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Nationalité: <strong>{{$postInfosAgent->nationalite}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Adresse Residence: <strong>{{$postInfosAgent->adresseResidence}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Num Compte Bancaire: <strong>{{$postInfosAgent->NumCompteBancaire}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2 btnAdra">
                            @if(! empty($postInfosAgent->projet->intituleProjet))
                                <p class="card-text text-light">Projet : <strong>{{$postInfosAgent->projet->intituleProjet}}</strong></p>
                            @else
                                <p class="card-text text-light">Projet: Pas de projet pour cet Agent</p>
                            @endif
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Fonction: <strong>{{$postInfosAgent->fonction}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Lieu Affectation: <strong>{{$postInfosAgent->lieuAffectation}}</strong></p>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-sm-3 mt-2 bg-success">
                            <p class="card-text">Date Debut: <strong>{{ Carbon\Carbon::parse($postInfosAgent->dateDebut)->format('d-m-Y') }}</strong></p>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <p class="card-text">Date Fin Prevue: <strong>{{ Carbon\Carbon::parse($postInfosAgent->dateFinPrevue)->format('d-m-Y') }}</strong></p>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <p class="card-text">Date Fin Effective: <strong>{{ Carbon\Carbon::parse($postInfosAgent->DateFinEffective)->format('d-m-Y') }}</strong></p>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <p class="card-text">Durée Contrat Mois: <strong>{{$postInfosAgent->DureeContratMois}}</strong></p>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <p class="card-text">Durée Contrat Jour: <strong>{{$postInfosAgent->DureeContratJour}}</strong></p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Observation: <strong>{{$postInfosAgent->status}}</strong> <span class="ml-3"><a href="{{route('admin.agents.updateStatusAgent',[$postInfosAgent->id])}}" class="linkBtnModifStatusAgent">modification</a></span></p>
                        </div>  
                        <div class="col-sm-12 mt-2">
                            <p class="card-text">Salaire: <strong>{{$postInfosAgent->salaires}}</strong></p>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <p class="card-text" style="font-weight: bold">Liste des congé de l'agent: <strong><a href="{{route('admin.agents.post.listeCongeAgent',[$postInfosAgent->id])}}" title="click pour voir la liste des staff pour le projet">voir plus</a></strong></p>
                        </div>  
                        <div class="col-sm-12 mt-2 bg-successM">
                            <p class="card-text" style="font-weight: bold">Documents</p>                            
                            <ul>
                                @forelse($postInfosAgent->piecejointe as $pieceJointe)
                                    <li class="row bg-dangerM"> 
                                        <a href="{{asset('storage/'.$pieceJointe->documentsAgnet)}}" target="_blank" class="col-sm-8 bg-infoM">document / {{$pieceJointe->nomPiecejointe}}
                                        <span><a href="{{route('admin.agents.deletetDocument.delete',[$pieceJointe->id])}}" id="{{$pieceJointe->id}}" class="col-sm-2 bg-infoM linkDocSup">supprimer</a></span>
                                    </li>
                                @empty
                                    <p class="card-text" style="font-weight: bold">Aucun Documents</p>
                                @endforelse
                            </ul> 
                        </div>  
                    </div>                
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <!-- Modal Ajout piéce jointe -->
        <div class="modal fade" id="modal-AjoutPieceJointe" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-AjoutPieceJointe">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Formulaire d'enregistrement piéce jointe</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAjoutDocument" action="{{route('admin.agents.AjoutDocument.store',[$postInfosAgent->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="file" name="docPieceJointe" id="docPieceJointe"/>
                                        <span class="text-danger error-text numeroProjet_error"></span>
                                    </div> 
                                    <div class="form-group">
                                        <input type="text" name="nomPiece" class="form-control" placeholder="Ajouter un pour votre piéce jointe" required />
                                    </div> 
                                    <!-- div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="docPieceJointe[]" id="docPieceJointe" class="custom-file-input" multiple>
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div -->
                                    <div class="form-group">
                                        <button id="btnAjoutDocument" type="submit" class="btn text-light btnAdra btnAdraActive form-control">Enregistrer</button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /End Modal Ajout piéce jointe -->
    </div>
@endsection