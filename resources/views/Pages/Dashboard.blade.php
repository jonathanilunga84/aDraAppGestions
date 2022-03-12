@extends('layouts.LayoutDashboard')

@section('title')
	Tableau de bord
@endsection

@section('ContentHeader')
	<div class="container-fluid">
        <div class="row mb-2">
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
        <div class="col-12">
            <div class="jumbotron">
                <h3>Bienvenu, <strong>{{userFullName()}}</strong></h3>
                <hr />
                <p>Adventist Development Relief And Agency</p>
            </div>
        </div>
    </div>
@endsection