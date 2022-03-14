<?php

use Illuminate\Support\Str;

function userFullName(){
	//return auth()->user()->nom." ".auth()->user()->email;
	return auth()->user()->email;
}

/*function setMenuOpen($route){
	if(request()->route()->getName() === $route){
		return "menu-open";
	}
	return "";
}*/

function setMenuClass($route, $classe){
	$routeActuel = request()->route()->getName();
	//la function contains est defini en bas dans ce même helpers
	if(contains($routeActuel, $route)){
		return $classe;
	}
	return "";
}

function setMenuActive($route){
	$routeActuel = request()->route()->getName();
	if($routeActuel === $route){
		return "active";
	}
	return "";
}

//la function contains permet de verifier si un element existe dans une chaine donnée
function contains($container, $contenu){
	return Str::contains($container, $contenu);
}