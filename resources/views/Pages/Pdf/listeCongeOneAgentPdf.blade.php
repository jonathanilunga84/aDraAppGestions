@extends('layouts.LayoutPdf')

@section('content')
	<h3>Liste des Congé pour l'agent</h3>
	<p>Nom: {{$listeCongeOneAgent->nom}}</p>
    <p>Postnom: {{$listeCongeOneAgent->postnom}}</p>
    <p>Prenom: {{$listeCongeOneAgent->prenom}}</p>
    <p>Sexe: {{$listeCongeOneAgent->sexe}}</p>
	<table class="table table-borderedM mb-5">
        <thead>
            <tr class="table-dangerM">
                <th scope="col">#</th>
                <th scope="col">Circonstance Congé</th>
                <th scope="col">Durée Congé</th>
                <th scope="col">Date Depart</th>
                <th scope="col">Date Retour</th>
                <th scope="col">fonction</th>
                <th scope="col">Observation</th>
            </tr>
        </thead>
        <tbody>
        	@forelse($listeCongeOneAgent->conges as $item)
            <tr>
                <td>{{$loop->index + 1 }}</td>
                <td>{{$item->circonstanceConge}}</td>
                <td>{{$item->dureeConge}}</td>
                <td>{{ Carbon\Carbon::parse($item->dateDepart)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($item->dateRetour)->format('d-m-Y') }}</td>
                <td>{{$item->fonction}}</td>
                <td>{{$item->statusConge}}</td>
            </tr>
            @empty
            <h4 class="text-center bg-danger">Pas de congé pour</h4>
            @endforelse
        </tbody>
    </table>
@endsection
