@extends('layouts.LayoutPdf')

<!-- methode listeAgentsEncoursAffecteAuProjetPdf qui est dans le controller ProjetController -->
@section('content')
	<h5>Liste Staffs affectés au projet en cours</h5>
	<p>Projet: 
		{{$listeAgentsEncoursAffecteAuProjet->intituleProjet}} <br />
		{{ Carbon\Carbon::parse($listeAgentsEncoursAffecteAuProjet->dateProjet)->format('d-m-Y') }} au
		{{ Carbon\Carbon::parse($listeAgentsEncoursAffecteAuProjet->dateFinProjet)->format('d-m-Y') }} à 
		{{$listeAgentsEncoursAffecteAuProjet->lieuProjet}} 
	</p>
	<table class="table table-borderedM mb-5 text-centerM">
        <thead>
            <tr class="table-dangerM">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Postnom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Sexe</th>
                <th scope="col">Fonction</th>
                <th scope="col">Status</th>
                <th scope="col">Date début</th>
                <th scope="col">Date fin</th>
            </tr>
        </thead>
        <tbody>
        	@forelse($agents as $item)
            <tr>
            	<th scope="row">{{$loop->index + 1}}</th>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->postnom }}</td>
                <td>{{ $item->prenom }}</td>
                <td>{{ $item->sexe }}</td>
                <td>{{ $item->fonction }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ Carbon\Carbon::parse($item->dateDebut)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($item->dateFinPrevue)->format('d-m-Y') }}</td>
            </tr>
            @empty
                <h4 class="text-center bg-danger text-center">Pas de Staff pour le projet</h4>
            @endforelse
        </tbody>
    </table>
@endsection
