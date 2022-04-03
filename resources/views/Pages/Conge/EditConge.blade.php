@extends('layouts.LayoutDashboard')

@section('title')
	Formulaire de modification Conge
@endsection

@section('ContentHeader')
	<div class="row card">
		<div class="card-header">
			<h3 class="card-title">Formulaire de modification Congés</h3>
		</div>
		<h5 class="mt-2 ml-4 bg-infoM">Identité:
			@if(! empty($postEditConge->agent->nom) )
                {{$postEditConge->agent->nom}} {{$postEditConge->agent->postnom}}
            @else
            	pas de nom trouvé
            @endif
		</h5>
		<div class="col-sm-8 ml-3 mb-2">
			<h6>Circonstance Conge:  {{$postEditConge->circonstanceConge}} <!-- span class="ml-3"><a href="">Modification</a></span --></h6>
		</div>
		<form id="formModifConge" action="{{route('admin.conges.updateConge',[$postEditConge->id])}}" class="ml-3 bg-infoM" method="POST">
			@csrf
			<div class="col-sm-12">
				<!-- input type="text" name="IdConge" id="IdConge" value="{{$postEditConge->id}}" / -->
				<div class="row bg-dangerM">
					<div class="col-sm-3">Total Jour Prevue:</div>
					<div class="col-sm-6 form-group">
						<input type="text" name="totalJourPrevueConge" class="form-control" id="totalJourPrevueConge" placeholder="Entrez total jour prevue" aria-invalid="false" value="{{$postEditConge->totalJourPrevueConge}}">
					</div>
				</div>
				<div class="row bg-dangerM">
					<div class="col-sm-3">Nombre jour Conge Deja Pris:</div>
					<div class="col-sm-6 form-group">
						<input type="text" name="congeDejaPris" class="form-control" id="congeDejaPris" placeholder="Entrez nombre de jour déja pris" aria-invalid="false" value="{{$postEditConge->congeDejaPris}}">
					</div>
				</div>
				<div class="row bg-dangerM">
					<div class="col-sm-3">Nombre de jour(s) Demandé:</div>
					<div class="col-sm-6 form-group">
						<input type="text" name="nbrJrD" class="form-control" id="nbrJrD" placeholder="Entrez nombre de jour demandé" aria-invalid="false" value="{{$postEditConge->nbrJrD}}">
					</div>
				</div>
				<div class="row bg-dangerM">
					<div class="col-sm-3">Nombre de jour(s) Restant:</div>
					<div class="col-sm-6 form-group">
						<input type="text" name="nbrJourR" class="form-control" id="nbrJourR" placeholder="Entrez nombre de jour restant" aria-invalid="false" value="{{$postEditConge->nbrJourR}}" />
					</div>
				</div>
				<div class="row bg-dangerM">
					<div class="col-sm-3">Commentaires:</div>
					<div class="col-sm-6 form-group">
						<textarea name="explicationConge" class="form-control" id="explicationConge"  aria-invalid="false">{{$postEditConge->explicationConge}}
						</textarea>
					</div>
				</div>
				<div class="row bg-dangerM">
					<div class="col-sm-2 bg-infoM">Date Depart:</div>
					<div class="col-sm-3 form-group">
						<input type="date" name="dateDepart" class="form-control" id="dateDepart" placeholder="Entrez date depart" aria-invalid="false" value="{{$postEditConge->dateDepart}}" />
					</div>
					<div class="col-sm-2 bg-infoM">Date Retour:</div>
					<div class="col-sm-3 form-group">
						<input type="date" name="dateRetour" class="form-control" id="dateRetour" placeholder="Entrez date retour" aria-invalid="false" value="{{$postEditConge->dateRetour}}" />
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<button type="submit" id="btnModifConge" class="btnM btnAdra btnActive text-light form-control">Valider la modification</button>
					</div>
				</div>
			</div>
		</form>
		<div class="col-sm-12 ml-3M mt-2 mb-2">
			<h6>Observation Conge:  {{$postEditConge->statusConge}} <span class="ml-3"><a href="{{route('admin.conges.updateStatusConge',[$postEditConge->id])}}" class="linkBtnModifStatusConge">Modification</a></span></h6>
		</div>
	</div>
@endsection