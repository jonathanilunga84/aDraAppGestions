@extends('layouts.LayoutPdf')

@section('content')
	<h5>Liste des Congé pour les Staffs du projet</h5>
    <p>Projet: 
        {{$projet->intituleProjet}} <br />
        {{ Carbon\Carbon::parse($projet->dateProjet)->format('d-m-Y') }} au
        {{ Carbon\Carbon::parse($projet->dateFinProjet)->format('d-m-Y') }} à 
        {{$projet->lieuProjet}} 
    </p>
	<table class="table table-borderedM mb-5">
        <thead>
            <tr class="table-dangerM">
                <th scope="col">#</th>
                <th scope="col">Identité</th>
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
        	@forelse($conges as $conge)
            <tr>
                <td>{{$loop->index + 1 }}</td>
                <td>
                    @if(! empty($conge->agent->prenom))
                        {{$conge->agent->nom}} {{$conge->agent->postnom}} {{$conge->agent->prenom}}
                    @else
                        pas de nom trouvé
                    @endif
                </td>
                <td>{{$conge->circonstanceConge}}</td>
                <td>{{$conge->totalJourPrevueConge}}</td>
                <td>{{$conge->congeDejaPris}}</td>
                <td>{{$conge->nbrJrD}}ff</td>
                <td>{{$conge->nbrJourR}}</td>
                <td>{{ Carbon\Carbon::parse($conge->dateDepart)->format('d-m-Y') }}</td>
                <td>{{ Carbon\Carbon::parse($conge->dateRetour)->format('d-m-Y') }}</td>
                @if($conge->statusConge == "terminé")
                    <td class="bg-dangerM text-danger text-center">
                        {{$conge->statusConge}}
                    </td>
                @else
                    <td class="bg-successM text-success text-center">
                        {{$conge->statusConge}}
                    </td>
                @endif
            </tr>
            @empty
            <h5 class="text-centerM bg-danger">Pas de congé trouvé</h5>
            @endforelse
        </tbody>
    </table>
@endsection