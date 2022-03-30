@extends('layouts.LayoutPdf')

@section('content')
	<h3>Liste Staffs affectés au projet en cours</h3>
	<p>Projet: 
		{{$listeAgentsAffecteAuProjet->intituleProjet}} <br />
		{{ Carbon\Carbon::parse($listeAgentsAffecteAuProjet->dateProjet)->format('d-m-Y') }} au
		{{ Carbon\Carbon::parse($listeAgentsAffecteAuProjet->dateFinProjet)->format('d-m-Y') }} à 
		{{$listeAgentsAffecteAuProjet->lieuProjet}} 
	</p>
	<table class="table table-borderedM mb-5">
        <thead>
                <tr class="table-dangerM">
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Postnom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">sexe</th>
                    <th scope="col">fonction</th>
                </tr>
            </thead>
        <tbody>
        	@foreach($listeAgentsAffecteAuProjet->agents as $item)
            <tr>
            	<th scope="row">{{$loop->index + 1}}</th>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->postnom }}</td>
                <td>{{ $item->prenom }}</td>
                <td>{{ $item->sexe }}</td>
                <td>{{ $item->fonction }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
