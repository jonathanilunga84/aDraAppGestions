@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid bg-dangerM">
        <div class="row mb-1M">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de bord</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a href="#">Accueil</a></li>
                    <!-- li class="breadcrumb-item active">Starter Page</li -->
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 text-center">
            <h5>Statistiques Staffs</h5>
        </div>
        <!-- div class="col-12">
            <div class="jumbotron">
                <h3>@auth Bienvenu, <strong>{{ userFullName() }}</strong> @else <p>Inconnue Non Authentifié</p>@endauth</h3>
                <hr />
                <p>Adventist Development And Relief Agency</p>
            </div>
        </div -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totalStaff}}</h3>
                    <p class="">Total Staff en cours Et terminé</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <!-- a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
                </a -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$totalStaffHommeEncours}}<sup style="font-size: 20px"></sup></h3>
                    <p>Total Staff Homme en cours</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$totalStaffFemmeEncours}}</h3>
                    <p>Total Staff Femme en cours</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$totalStaffsTermine}}</h3>
                    <p>Total Staff Terminé</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <h5>Statistiques Projets</h5>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totalProjet}}</h3>
                    <p class="">Total Projet</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <!-- a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
                </a -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$totalProjetEncours}}</h3>
                    <p class="">Total Projet en cours</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <!-- a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
                </a -->
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$totalProjetTermine}}</h3>
                    <p class="">Total Projet Terminé</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <!-- a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
                </a -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <h5>Statistiques Congés</h5>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$totalCongeEncours}}</h3>
                    <p class="">Total Congé en cours</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <!-- a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i>
                </a -->
            </div>
        </div>
    </div>
@endsection