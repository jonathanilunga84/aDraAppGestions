@extends('layouts.LayoutPdf')

@section('content')
	<h5>Liste Staffs affectés au projet en cours</h5>
	<p>Projet: 
		{{$listeAgentsAffecteAuProjet->intituleProjet}} <br />
		{{ Carbon\Carbon::parse($listeAgentsAffecteAuProjet->dateProjet)->format('d-m-Y') }} au
		{{ Carbon\Carbon::parse($listeAgentsAffecteAuProjet->dateFinProjet)->format('d-m-Y') }} à 
		{{$listeAgentsAffecteAuProjet->lieuProjet}} 
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
                <th scope="col">Date début</th>
                <th scope="col">Date fin</th>
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
                <td>{{ $item->fonction }}fffffffbbbbbbbbbbbhhhhhhhhhhhhhhhhh</td>
                <td>{{ Carbon\Carbon::parse($item->dateDebut)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($item->dateFinPrevue)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <table>
        <thead> <!-- En-tête du tableau -->
            <tr>
                <th>Nom</th>
                <th>Age</th>
                <th>Pays</th>
            </tr>
        </thead>
        <tbody> <!-- Corps du tableau -->
            <tr>
                <td>Carmendddddddddddddddddd</td>
                <td>33 ans Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                <td>Espagne </td>
            </tr>
            <tr>
                <td>Carmen</td>
                <td>33 ans vvvvvvvvvvvvvvvvvvvvvvv</td>
                <td>Espagnevvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
            </tr>
        </tbody>
    </table> --}}
@endsection
