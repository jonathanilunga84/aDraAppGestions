@extends('layouts.LayoutPdf')

@section('content')
	<h3>Liste des Staff Congé en cours</h3>
	<table class="table table-borderedM mb-5">
        <thead>
            <tr class="table-dangerM">
                <th scope="col">#</th>
                <th scope="col">Identité</th>
                <th scope="col">Circonstance Congé</th>
                <th scope="col">Projet</th>
                <th scope="col">Durée Congé</th>
                <th scope="col">Date Depart</th>
                <th scope="col">Date Retour</th>
                <th scope="col">Observation</th>
            </tr>
        </thead>
        <tbody>
        	@forelse($listeStaffCongeEnCours as $item)
            <tr>
                <td>{{$loop->index + 1 }}</td>
                <td>{{$item->agent->nom}}</td>
                <td>{{$item->circonstanceConge}}</td>
                <td>{{$item->projet->intituleProjet}}</td>
                <td>{{$item->dureeConge}}</td>
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
