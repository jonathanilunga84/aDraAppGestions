<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'numProjet',
        'nom',
        'postnom',
        'prenom',
        'sexe',
        'telephone',
        'lieuNaissance',
        'dateNaissance',
        'etatCivil',
        'email',
        'NumCarteIdentite',
        'nationalite',
        'adresseResidence',
        'NumCompteBancaire',
        'projet_id',
        'fonction',
        'lieuAffectation',
        'dateDebut',
        'dateFinPrevue',
        'DateFinEffective',
        'DureeContratMois',
        'DureeContratJour',
        'status',
        'user_id'
    ];
}
