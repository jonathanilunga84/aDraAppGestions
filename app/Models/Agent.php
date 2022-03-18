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
        'salaires',
        'user_id'
    ];

    /* un agent est lié a un seul user */
    public function user(){
        return $this->belongsTo(User::class);
    }

    //un Agent peu avoir un ou plusiers Conge
    public function conges(){
        return $this->hasMay(Conge::class);
    }

    /*public function Conges(){
        return $this->belongsTo(Conge::class);
    }*/

    /* selection d'un projet lie a un agent */
    public function projet()
    {
        return $this->belongsTo(Projet::class);
        /*return $this->hasMany(Projet::class);*/
    }
}
