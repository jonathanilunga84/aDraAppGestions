<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'numeroProjet',
        'intituleProjet',
        'dateProjet',
        'dateFinProjet',
        'lieuProjet',
        'status',
        'user_id'
    ];

    /* selection de plusieurs agents lieu au projet */
    public function agents(){
        return $this->hasMany(Agent::class);
    }

    public function conges(){
        return $this->hasMany(Conge::class);
    }

    public function congeAgentProjet()
    {
        return $this->hasManyThrough(Conge::class, Agent::class)->orderBy('nom');
    }
}
