<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable = ['agent_id','projet_id','circonstanceConge','dureeConge','dateDepart','dateRetour','statusConge',];

    //un Agent peu avoir un ou plusiers Conge l'inverse est permis
    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function projet(){
        return $this->belongsTo(Projet::class);
    }


}
