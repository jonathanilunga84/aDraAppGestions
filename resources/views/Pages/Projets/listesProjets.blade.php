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
    <div class="row card">

        <div class="col-12">
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
        </div>

        <!-- table -->
        <div class="col-12">
            <div class="card">
                <!-- div class="card-header">
                    <h3 class="card-title">Liste des Projets</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div -->
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <!-- th>Numéro projet</th -->
                                <th>Intitulé du projet</th>
                                <th>Lieu(e) du projet</th>
                                <th>Date début projet</th>
                                <th>Date fin projet</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- div id="show_all_projets_Search"></div -->
                        <tbody>
                             @forelse($listesProjets as $item)
                            <tr>
                                <!-- td>{{$item->numeroProjet}}</td -->
                                <td>{{$item->intituleProjet}}</td>
                                <td>{{$item->lieuProjet}}</td>
                                <td>{{ Carbon\Carbon::parse($item->dateProjet)->format('d-m-Y') }}</td>
                                <td><span class="tag tag-success">{{ Carbon\Carbon::parse($item->dateFinProjet)->format('d-m-Y') }}</span></td>
                                <td>
                                    <a id="{{$item->id}}" href="{{route('admin.projets.post.show',[$item->id])}}" class="btn btn-success btnVueGlobal" title="Vue globale sur le projet"><i class="far fa-eye"></i></a>
                                    <a id="{{$item->id}}" href="#" class="btn btn-primary btnEditProjet" data-toggle="modal" data-target="#modal-ModifProjet"><i class="far fa-edit"></i></a>
                                    <a id="{{$item->id}}" href="#" data-toggle="modal" data-target="#show_confirm_Delete_Form{{ $item->id }}" class="btn btn-danger show_confirm_Delete_Projet_URL showf" data-my="selectedLink{{$item->id}}" title="supprimer"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @empty
                            <h4 class="text-center">Aucun projet trouvée pour le moment...</h4>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <!-- Modal AjoutProjet-->
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
                            <!-- label for="numeroProjet">Numéro du Projet</label -->
                            <input type="hidden" name="numeroProjet" class="form-control" id="numeroProjet" value="000000" placeholder="Entrez Numéro du projet" aria-invalid="false">
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
        <!-- /End Modal AjoutProjet -->

        <!-- Modal ModifPojet-->
        <div class="modal fade" id="modal-ModifProjet" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-ModifProjet">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Formulaire modification projet</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formModifProjet" action="{{route('admin.projets.projet.update')}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="IdModif" id="IdModif" />
                            <!-- label for="numeroProjet">Numéro du Projet</label -->
                            <input type="hidden" name="numeroProjetM" class="form-control" id="numeroProjetM" value="000000" placeholder="Entrez Numéro du projet" aria-invalid="false">
                            <span class="text-danger error-text numeroProjet_error"></span>
                        </div> 
                        <div class="form-group">
                            <label for="intituleProjet">Intitulé du projet</label>
                            <input type="text" name="intituleProjetModif" class="form-control" id="intituleProjetModif" placeholder="Entrez Intitulé du projet" aria-invalid="false">
                            <span class="text-danger error-text intituleProjetModif_error"></span>
                        </div> 
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dateProjet">Date du projet</label>
                                    <input type="date" name="dateProjetModif" class="form-control" id="dateProjetModif" placeholder="Entrez du projet" aria-invalid="false">
                                    <span class="text-danger error-text dateProjetModif_error"></span>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dateFinProjet">Date fin projet</label>
                                    <input type="date" name="dateFinProjetModif" class="form-control" id="dateFinProjetModif" placeholder="Entrez date fin projet" aria-invalid="false">
                                    <span class="text-danger error-text dateFinProjetModif_error"></span>
                                </div>
                            </div>
                        </div>               
                        <div class="form-group">
                            <label for="lieuProjet">Lieu(s) du projet</label>
                            <input type="text" name="lieuProjetModif" class="form-control" id="lieuProjetModif" placeholder="Entrez lieu du projet" aria-invalid="false">
                            <span class="text-danger error-text lieuProjetModif_error"></span>
                        </div>                       
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="btnSendModifProjet" type="submit" class="btn btn-primary">Valider le modification</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /End Modal ModifPojet-->
    </div>
@endsection