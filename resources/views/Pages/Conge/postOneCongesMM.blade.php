@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord / Infos des Congés</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Conges</a></li>
                    <li class="breadcrumb-item active">listes</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row card">

        <div class="col-12">
            <div class="row">
                <div class="col-9 btn-dangerM">
                    <form action="{{route('admin.conges.searchConge')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-5 bg-primaryM">
                            <div class="input-group input-group-sm btn-dangerM mt-2 mb-2" style="widthM: 500px;">
                        <!-- input type="text" name="AgentSearch" id="AgentSearch" class="form-control float-right" placeholder="Entrez nom ou postnom ou prenom agent" / -->
                        <select id="searchCongeVal" name="searchCongeVal" class="form-control float-right">
                            <option value="">---Select---</option>
                            <option value="Congé Annuel">Congé Annuel</option>
                            <option value="Congé de Circonstance">Congé de circonstance</option>
                            <option value="CongéMaladie">Congé Maladie</option>
                        </select>
                        <div class="input-group-append btn-dangerM">
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-3 bg-primaryM">
                    <!-- button type="button" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" data-toggle="modal" data-target="#modal-AjoutProjet">Ajout Projet</button -->
                    <a href="{{route('admin.conges.listesConge.index')}}" class="btn btn-block mt-2"><i class="fas fa-sync"></i></a>
                </div>
            </div>   
        </div>

        <!-- table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des Congés</h3>
                    <div class="card-tools">
                        <!-- div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div -->
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Indentité</th>
                                <th>Congé</th>
                                <th>Durée congé</th>
                                <th>Date depart</th>
                                <th>Date retour</th>
                                <th>Observation</th>
                                <th>Projét</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($listesConge as $item)
                            <tr>
                                <td>{{$item->agent->nom}} {{$item->agent->prenom}}</td>
                                <td>{{$item->circonstanceConge}}</td>
                                <td>{{$item->dureeConge}}</td>
                                <td><span class="tag tag-success">{{$item->dateDepart}}</span></td>
                                <td>{{$item->dateRetour}}</td>
                                <td>Congé {{$item->statusConge}}</td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-success" title="Vue global Congé"><i class="far fa-eye"></i></a>
                                    <a href="" class="btn btn-primary" title="Modification"><i class="far fa-edit"></i></a>
                                    <a id="btn1" href="#" data-toggle="modal" data-target="#show_confirm_Delete_Form{{ $item->id }}" class="btn btn-danger show_confirm_Delete_URL showf" title="supprimer"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @empty
                            <h4 class="text-center">Aucun congé trouvée pour le moment...</h4>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="modal fade" id="modal-AjoutProjet" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-AjoutProjet">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Formulaire Ajout projet</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAjoutProjet" action="{{route('admin.projets.projet.store')}}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="numeroProjet">Numéro du Projet</label>
                            <input type="text" name="numeroProjet" class="form-control" id="numeroProjet" placeholder="Entrez Numéro du projet" aria-invalid="false">
                            <span class="text-danger error-text numeroProjet_error"></span>
                        </div> 
                        <div class="form-group">
                            <label for="intituleProjet">Intitulé du projet</label>
                            <input type="text" name="intituleProjet" class="form-control" id="intituleProjet" placeholder="Entrez Intitulé du projet" aria-invalid="false">
                            <span class="text-danger error-text intituleProjet_error"></span>
                        </div> 
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dateProjet">Date du projet</label>
                                    <input type="date" name="dateProjet" class="form-control" id="dateProjet" placeholder="Entrez du projet" aria-invalid="false">
                                    <span class="text-danger error-text dateProjet_error"></span>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dateFinProjet">Date fin projet</label>
                                    <input type="date" name="dateFinProjet" class="form-control" id="dateFinProjet" placeholder="Entrez date fin projet" aria-invalid="false">
                                    <span class="text-danger error-text dateFinProjet_error"></span>
                                </div>
                            </div>
                        </div>               
                        <div class="form-group">
                            <label for="lieuProjet">Lieu(s) du projet</label>
                            <input type="text" name="lieuProjet" class="form-control" id="lieuProjet" placeholder="Entrez lieu du projet" aria-invalid="false">
                            <span class="text-danger error-text lieuProjet_error"></span>
                        </div>                       
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="btnSendProjet" type="submit" class="btn btn-primary">Enregister</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


          <!-- card a supprimer -->
        <!-- div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title float-right">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's
                        content.
                    </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div -->
    </div>
@endsection