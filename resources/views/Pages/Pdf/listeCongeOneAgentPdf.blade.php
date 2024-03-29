@extends('layouts.LayoutPdf')

@section('content')
	<h3>Historique des Congé pour l'agent</h3>
	<p>Nom: {{$listeCongeOneAgent->nom}}</p>
    <p>Postnom: {{$listeCongeOneAgent->postnom}}</p>
    <p>Prenom: {{$listeCongeOneAgent->prenom}}</p>
    <p>Sexe: {{$listeCongeOneAgent->sexe}}</p>
    <p>fonction: {{$listeCongeOneAgent->fonction}}</p>
	<table class="table table-borderedM mb-5">
        <thead>
            <tr class="table-dangerM">
                <th scope="col">#</th>
                <th scope="col">Congé</th>
                <th scope="col">Nbr de jours prévus</th>
                <th scope="col">Congé Deja Pris</th>
                <th scope="col">Nbr Jour demandé</th>
                <th scope="col">Nbr Jour Restant(s)</th>
                <th scope="col">Date dernier Depart</th>
                <th scope="col">Date dernier Retour</th>
                <th scope="col">Observation</th>
            </tr>
        </thead>
        <tbody>
        	@forelse($listeCongeOneAgent->conges as $item)
            <tr>
                <td>{{$loop->index + 1 }}</td>
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
        </tbody>
    </table>
@endsection
