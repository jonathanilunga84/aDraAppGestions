@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord / Listes des Agents</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Agents</a></li>
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
                    <form action="{{route('admin.agents.searchAgentParIdentite')}}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm btn-dangerM mt-2" style="widthM: 500px;">
                        <input type="text" name="AgentSearch" id="AgentSearch" class="form-control float-right" placeholder="Entrez nom ou postnom ou prenom agent" />
                        <div class="input-group-append btn-dangerM">
                            <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-sm-1">
                    <a href="{{route('admin.agents.listesAgents.index')}}" class="btn btn-block mt-2" title="actualiser la page"><i class="fas fa-sync"></i></a>
                </div>
                <div class="col-sm-3 btn-dangerM">
                    <button type="button" class="btn btn-block btn-primaryM btnAdra text-light mb-2 mt-2" data-toggle="modal" data-target="#modal-AjoutProjet">Ajout Agents</button>
                </div>
            </div>   
        </div>

        <!-- table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des Agents</h3>
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
                                <th>Nom</th>
                                <th>Postnom</th>
                                <th>Prenom</th>
                                <th>Fonction</th>
                                <th>Date début Projet</th>
                                <th>Date fin Projet</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyListesAgents">
                            <p id="myC"></p>
                            @forelse($listesAgents as $item)
                            <tr>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->postnom}}</td>
                                <td>{{$item->prenom}}</td>
                                <td>{{$item->fonction}}</td>
                                <td>{{$item->dateDebut}}</td>
                                <td>{{$item->dateFinPrevue}}</td>
                                <td>
                                    <a id="{{$item->id}}" href="{{route('admin.agents.AgentPost.show',[$item->id])}}" class="btn btn-success btnVueGlobalAgent" title="Vue globale sur le Agent"><i class="far fa-eye"></i></a>
                                    <a id="{{$item->id}}" href="#" class="btn btn-primary btnModifAgent btnModifAgentGetInfos" data-toggle="modal" data-target="#modal-ModifAgent"><i class="far fa-edit"></i></a>
                                    <a id="{{$item->id}}" href="#" data-toggle="modal" class="btn btn-danger show_confirm_Delete_URLM showf btnDeleteAgent"><i class="far fa-trash-alt"></i></a>
                                    <a id="{{$item->id}}"  href="{{route('admin.agents.getInfosAgent.showInfoAgent',[$item->id])}}" data-toggle="modal" data-target="#modal-AjoutConge" class="btn btn-info btnAjoutCongeAgent"><i class="fa fa-assistive-listening-systems"></i> CONGE</i></a>
                                </td>
                            </tr>
                            @empty
                            <h4 class="text-center">Aucun enregistrement pour le moment...</h4>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


        <div class="modal fade modal-dialog-scrollableM" tabindex="-1" data-backdrop="static" data-keyboard="false" id="modal-AjoutProjet">
            <div class="modal-dialog modal-AjoutProjetM modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Formulaire Enregistrement Agent</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAjoutAgent" action="{{route('admin.agents.AjoutAgent.store')}}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez le Agent" aria-invalid="false" value="{{old('nom')}}">
                                    <span class="text-danger error-text nom_error"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="postnom">Postnom</label>
                                    <input type="text" name="postnom" class="form-control" id="postnom" placeholder="Entrez Postnom Agent" aria-invalid="false" value="{{old('postnom')}}">
                                    <span class="text-danger error-text postnom_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="prenom">Prenom</label>
                                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrez prenom Agent" aria-invalid="false" value="{{old('prenom')}}">
                                    <span class="text-danger error-text prenom_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="sexe">Sexe</label>
                                    <select class="form-control" name="sexe" id="sexe">
                                        <option value="masculin">Masculin</option>
                                        <option value="feminin">Feminin</option>
                                    </select>
                                    <span class="text-danger error-text sexe_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="etatCivil">Etat Civil</label>
                                    <select class="form-control" name="etatCivil" id="etatCivil">
                                        <option value="celibataire">Célibataire</option>
                                        <option value="marie">Marie</option>
                                    </select>
                                    <span class="text-danger error-text etatCivil_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telephone">Télephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Entrez Numéro télephone" aria-invalid="false" value="{{old('telephone')}}">
                                    <span class="text-danger error-text telephone_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lieuNaissance">Lieu de Naissance</label>
                                    <input type="text" name="lieuNaissance" class="form-control" id="lieuNaissance" placeholder="Entrez lieu de Naissance" aria-invalid="false" value="{{old('lieuNaissance')}}">
                                    <span class="text-danger error-text lieuNaissance_error"></span>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="mail facultatif" aria-invalid="false" value="{{old('email')}}">
                                    <span class="text-danger error-text email_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NumCarteIdentite">Num Carte Identité</label>
                                    <input type="text" name="NumCarteIdentite" class="form-control" id="NumCarteIdentite" placeholder="Num Carte Identite facultatif" aria-invalid="false" value="{{old('NumCarteIdentite')}}">
                                    <span class="text-danger error-text NumCarteIdentite_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nationalite">Nationalité</label>
                                    <input type="text" name="nationalite" class="form-control" id="nationalite" placeholder="Entrez la nationalité" aria-invalid="false">
                                    <span class="text-danger error-text nationalite_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="adresseResidence">Adresse Residence</label>
                                    <input type="text" name="adresseResidence" class="form-control" id="adresseResidence" placeholder="Entrez Adresse Residence" aria-invalid="false">
                                    <span class="text-danger error-text adresseResidence_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NumCompteBancaire">Num Compte Bancaire</label>
                                    <input type="text" name="NumCompteBancaire" class="form-control" id="NumCompteBancaire" placeholder="Entrez la Num Compte Bancaire" aria-invalid="false">
                                    <span class="text-danger error-text NumCompteBancaire_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="projet_id">Projet</label>
                                    <select class="form-control" name="projet_id" id="projet_id">
                                        <option value="">---Select Projet---</option>
                                        @forelse($listesProjets as $listeprojet)
                                        <option value="{{$listeprojet->id}}">{{$listeprojet->intituleProjet}}</option>
                                        @empty
                                        <option value="">Aucun Projet</option>
                                        @endforelse
                                    </select>
                                    <span class="text-danger error-text projet_id_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fonction">Fonction</label>
                                    <input type="text" name="fonction" class="form-control" id="fonction" placeholder="Entrez la Fonction" aria-invalid="false">
                                    <span class="text-danger error-text fonction_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lieuAffectation">Lieu d'affectation</label>
                                    <input type="text" name="lieuAffectation" class="form-control" id="lieuAffectation" placeholder="Entrez lieu d'affectation" aria-invalid="false">
                                    <span class="text-danger error-text lieuAffectation_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dateNaissance">Date Naissance</label>
                                    <input type="date" name="dateNaissance" class="form-control" id="dateNaissance" placeholder="Entrez du projet" aria-invalid="false">
                                    <span class="text-danger error-text dateNaissance_error"></span>
                                </div> 
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dateDebut">Date debut</label>
                                    <input type="date" name="dateDebut" class="form-control" id="dateDebut" placeholder="Entrez date debut" aria-invalid="false">
                                    <span class="text-danger error-text dateDebut_error"></span>
                                </div> 
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dateFinPrevue">Date Fin Prevue</label>
                                    <input type="date" name="dateFinPrevue" class="form-control" id="dateFinPrevue" placeholder="Entrez date Fin Prevue" aria-invalid="false">
                                    <span class="text-danger error-text dateFinPrevue_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="DateFinEffective">Date Fin Effective</label>
                                    <input type="date" name="DateFinEffective" class="form-control" id="DateFinEffective" placeholder="Entrez Date Fin Effective" aria-invalid="false">
                                    <span class="text-danger error-text DateFinEffective_error"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="DureeContratMois">Durée Contrat Mois</label>
                                    <input type="text" name="DureeContratMois" class="form-control" id="DureeContratMois" placeholder="Entrez Durée Contrat Mois" aria-invalid="false">
                                    <span class="text-danger error-text DureeContratMois_error"></span>
                                </div>  
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="DureeContratJour">Durée Contrat Jour</label>
                                    <input type="text" name="DureeContratJour" class="form-control" id="DureeContratJour" placeholder="Entrez Durée Contrat Jour" aria-invalid="false">
                                    <span class="text-danger error-text DureeContratJour_error"></span>
                                </div>  
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="status">Observation</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="en cours">EN COURS</option>
                                        <option value="en cours sn">EN COURS SN</option>
                                        <option value="demission">DEMISSION</option>
                                        <option value="deces">DECES</option>
                                        <option value="resiliation">RESILIATION</option>
                                        <option value="expiration">EXPIRATION</option>
                                        <option value="absent">ABSENT</option>
                                        <option value="tache additionnelle">TACHE ADDITIONNELLE</option>
                                        <option value="nouvelle affectation">NOUVELLE AFFECTATION</option>
                                        <option value="mise en disponibilite">MISE EN DISPONIBILITE</option>
                                        <option value="suspension">SUSPENSION</option>
                                    </select>
                                    <span class="text-danger error-text status_error"></span>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="salaires">Salaire</label>
                                    <input type="text" name="salaires" class="form-control" id="salaires" placeholder="Entrez salaire" aria-invalid="false" value="{{old('salaires')}}">
                                    <span class="text-danger error-text salaires_error"></span>
                                </div> 
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="salaires">Devise</label>
                                    <select class="form-control" name="devise" id="devise">
                                        <option>Franc</option>
                                        <option>US</option>
                                        <option>Euro</option>
                                    </select>
                                    <span class="text-danger error-text devise_error"></span>
                                </div> 
                            </div>
                        </div>                     
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="btnSendAgent" type="submit" class="btn btn-primary">Enregister Agent</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal Ajout Agent -->

        <!-- modal Modif Agent -->
        <div class="modal fade modal-dialog-scrollableM" tabindex="-1" data-backdrop="static" data-keyboard="false" id="modal-ModifAgent">
            <div class="modal-dialog modal-ModifAgent modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Formulaire Modification Agent</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formModifAgent" action="{{route('admin.agents.agent.update')}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="IdAgentModif" id="IdAgentModif" />
                                <div class="form-group">
                                    <label for="nomModif">Nom</label>
                                    <input type="text" name="nomModif" class="form-control" id="nomModif" placeholder="Entrez le Agent" aria-invalid="false">
                                    <span class="text-danger error-text nomModif_error"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="postnomModif">Postnom</label>
                                    <input type="text" name="postnomModif" class="form-control" id="postnomModif" placeholder="Entrez Postnom Agent" aria-invalid="false">
                                    <span class="text-danger error-text postnomModif_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="prenomModif">Prenom</label>
                                    <input type="text" name="prenomModif" class="form-control" id="prenomModif" placeholder="Entrez prenom Agent" aria-invalid="false">
                                    <span class="text-danger error-text prenomModif_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="sexeModif">Sexe</label>
                                    <select class="form-control" name="sexeModif" id="sexeModif">
                                        <option value="masculin">Masculin</option>
                                        <option value="feminin">Feminin</option>
                                    </select>
                                    <span class="text-danger error-text sexeModif_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="etatCivilModif">Etat Civil</label>
                                    <select class="form-control" name="etatCivilModif" id="etatCivilModif">
                                        <option value="celibataire">Célibataire</option>
                                        <option value="marie">Marie</option>
                                    </select>
                                    <span class="text-danger error-text etatCivilModif_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="telephoneModif">Télephone</label>
                                    <input type="text" name="telephoneModif" class="form-control" id="telephoneModif" placeholder="Entrez Numéro télephone" aria-invalid="false">
                                    <span class="text-danger error-text telephoneModif_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lieuNaissanceModif">Lieu de Naissance</label>
                                    <input type="text" name="lieuNaissanceModif" class="form-control" id="lieuNaissanceModif" placeholder="Entrez lieu de Naissance" aria-invalid="false">
                                    <span class="text-danger error-text lieuNaissanceModif_error"></span>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="emailModif">Email</label>
                                    <input type="text" name="emailModif" class="form-control" id="emailModif" placeholder="mail facultatif" aria-invalid="false">
                                    <span class="text-danger error-text emailModif_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NumCarteIdentiteModif">Num Carte Identité</label>
                                    <input type="text" name="NumCarteIdentiteModif" class="form-control" id="NumCarteIdentiteModif" placeholder="Num Carte Identite facultatif" aria-invalid="false">
                                    <span class="text-danger error-text NumCarteIdentiteModif_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nationaliteModif">Nationalité</label>
                                    <input type="text" name="nationaliteModif" class="form-control" id="nationaliteModif" placeholder="Entrez la nationalité" aria-invalid="false">
                                    <span class="text-danger error-text nationaliteModif_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="adresseResidenceModif">Adresse Residence</label>
                                    <input type="text" name="adresseResidenceModif" class="form-control" id="adresseResidenceModif" placeholder="Entrez Adresse Residence" aria-invalid="false">
                                    <span class="text-danger error-text adresseResidenceModif_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="NumCompteBancaireModif">Num Compte Bancaire</label>
                                    <input type="text" name="NumCompteBancaireModif" class="form-control" id="NumCompteBancaireModif" placeholder="Entrez la Num Compte Bancaire" aria-invalid="false">
                                    <span class="text-danger error-text NumCompteBancaireModif_error"></span>
                                </div>  
                            </div>
                            <!-- div class="col-6">
                                <div class="form-group">
                                    <label for="projet_idModif">Projet</label>
                                    <select class="form-control" name="projet_idModif" id="projet_idModif">
                                        <option value="">---Select Projet---</option>
                                        @forelse($listesProjets as $listeprojet)
                                        <option value="{{$listeprojet->id}}">{{$listeprojet->intituleProjet}}</option>
                                        @empty
                                        <option value="">Aucun Projet</option>
                                        @endforelse
                                    </select>
                                    <span class="text-danger error-text projet_idModif_error"></span>
                                </div>  
                            </div -->
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="fonctionModif">Fonction</label>
                                    <input type="text" name="fonctionModif" class="form-control" id="fonctionModif" placeholder="Entrez la Fonction" aria-invalid="false">
                                    <span class="text-danger error-text fonctionModif_error"></span>
                                </div>  
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="lieuAffectationModif">Lieu d'affectation</label>
                                    <input type="text" name="lieuAffectationModif" class="form-control" id="lieuAffectationModif" placeholder="Entrez lieu d'affectation" aria-invalid="false">
                                    <span class="text-danger error-text lieuAffectationModif_error"></span>
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dateNaissanceModif">Date Naissance</label>
                                    <input type="date" name="dateNaissanceModif" class="form-control" id="dateNaissanceModif" placeholder="Entrez du projet" aria-invalid="false">
                                    <span class="text-danger error-text dateNaissanceModif_error"></span>
                                </div> 
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dateDebuModif">Date debut</label>
                                    <input type="date" name="dateDebuModif" class="form-control" id="dateDebuModif" placeholder="Entrez date debut" aria-invalid="false">
                                    <span class="text-danger error-text dateDebuModif_error"></span>
                                </div> 
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="dateFinPrevueModif">Date Fin Prevue</label>
                                    <input type="date" name="dateFinPrevueModif" class="form-control" id="dateFinPrevueModif" placeholder="Entrez date Fin Prevue" aria-invalid="false">
                                    <span class="text-danger error-text dateFinPrevueModif_error"></span>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="DateFinEffectiveModif">Date Fin Effective</label>
                                    <input type="date" name="DateFinEffectiveModif" class="form-control" id="DateFinEffectiveModif" placeholder="Entrez Date Fin Effective" aria-invalid="false">
                                    <span class="text-danger error-text DateFinEffectiveModif_error"></span>
                                </div>
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="DureeContratMoisModif">Durée Contrat Mois</label>
                                    <input type="text" name="DureeContratMoisModif" class="form-control" id="DureeContratMoisModif" placeholder="Entrez Durée Contrat Mois" aria-invalid="false">
                                    <span class="text-danger error-text DureeContratMoisModif_error"></span>
                                </div>  
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="DureeContratJourModif">Durée Contrat Jour</label>
                                    <input type="text" name="DureeContratJourModif" class="form-control" id="DureeContratJourModif" placeholder="Entrez Durée Contrat Jour" aria-invalid="false">
                                    <span class="text-danger error-text DureeContratJourModif_error"></span>
                                </div>  
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="status">Observation</label>
                                    <select class="form-control" name="statusModif" id="statusModif">
                                        <option value="en cours">EN COURS</option>
                                        <option value="en cours sn">EN COURS SN</option>
                                        <option value="demission">DEMISSION</option>
                                        <option value="deces">DECES</option>
                                        <option value="resiliation">RESILIATION</option>
                                        <option value="expiration">EXPIRATION</option>
                                        <option value="absent">ABSENT</option>
                                        <option value="tache additionnelle">TACHE ADDITIONNELLE</option>
                                        <option value="nouvelle affectation">NOUVELLE AFFECTATION</option>
                                        <option value="mise en disponibilite">MISE EN DISPONIBILITE</option>
                                        <option value="suspension">SUSPENSION</option>
                                    </select>
                                    <span class="text-danger error-text statusModif_error"></span>
                                </div>  
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="salairesModif">Salaire</label>
                                    <input type="text" name="salairesModif" class="form-control" id="salairesModif" placeholder="Entrez salaire" aria-invalid="false">
                                    <span class="text-danger error-text salairesModif_error"></span>
                                </div> 
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="deviseModif">Devise</label>
                                    <select class="form-control" name="deviseModif" id="salairesModif">
                                        <option>Franc</option>
                                        <option>US</option>
                                        <option>Euro</option>
                                    </select>
                                    <span class="text-danger error-text deviseModif_error"></span>
                                </div> 
                            </div>
                        </div>                     
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="btnModifAgent" type="submit" class="btn btn-primary">Enregister Agent</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal Modif Agent -->

        <!-- Modal Ajout Congé -->
        <div class="modal fade" id="modal-AjoutConge" tabindex="-1" data-backdrop="static">
            <div class="modal-dialog modal-AjoutConge">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Formulaire pour le Congé</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAjoutConge" action="{{route('admin.conges.Conge.store')}}" method="POST">
                        @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="identite">Identité (Nom,prenom) demadeur Congé</label>
                            <input type="hidden" name="identiteId" id="identiteId" />
                            <input type="text" name="identite" class="form-control" id="identite" placeholder="encours de chargement..." aria-invalid="false">
                            <span class="text-danger error-text identite_error"></span>
                        </div> 
                        <div class="form-group">
                            <label for="projet_idConge">Projet</label>
                            <select class="form-control" name="projet_idConge" id="projet_idConge">
                                <option value="">---Select Projet---</option>
                                @forelse($listesProjets as $listeprojet)
                                <option value="{{$listeprojet->id}}">{{$listeprojet->intituleProjet}}</option>
                                @empty
                                <option value="">Aucun Projet</option>
                                @endforelse
                            </select>
                            <span class="text-danger error-text projet_idConge_error"></span>
                        </div> 
                        <div class="form-group">
                            <label for="circonstanceConge">Circonstance Congé</label>
                            <select class="form-control" name="circonstanceConge" id="circonstanceConge">
                                <option value="">---Select---</option>
                                <option value="Congé Annuel">Congé Annuel</option>
                                <option value="Congé de Circonstance">Congé de circonstance</option>
                                <!-- option value="Mariage">Mariage</option -->
                                <!-- option value="Maternité/Paternité">Maternité/Paternité</option -->
                                <option value="Congé Maladie">Congé Maladie</option>
                                <!-- option value="Autres à preciser">Autres à preciser</option -->
                            </select>
                            <span class="text-danger error-text circonstanceConge_error"></span>
                        </div> 
                        <div class="form-group">
                            <label for="dureeConge">Durée</label>
                            <input type="text" name="dureeConge" class="form-control" id="dureeConge" placeholder="Entrez lieu du projet" aria-invalid="false">
                            <span class="text-danger error-text dureeConge_error"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dateDepart">Date depart</label>
                                    <input type="date" name="dateDepart" class="form-control" id="dateDepart" placeholder="Entrez du projet" aria-invalid="false">
                                    <span class="text-danger error-text dateDepart_error"></span>
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="dateRetour">Date retour</label>
                                    <input type="date" name="dateRetour" class="form-control" id="dateRetour" placeholder="Entrez date fin projet" aria-invalid="false">
                                    <span class="text-danger error-text dateRetour_error"></span>
                                </div>
                            </div>
                        </div>                                      
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button id="btnSendAjoutConge" type="submit" class="btn btn-primary">Enregister</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /Modal End Ajout Congé -->
        

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