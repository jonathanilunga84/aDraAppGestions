<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    //'projet_id',
    protected $fillable = ['agent_id','circonstanceConge','totalJourPrevueConge','congeDejaPris','nbrJrD','nbrJourR','explicationConge','dateDepart','dateRetour','statusConge',];

    //un Agent peu avoir un ou plusiers Conge l'inverse est permis
    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function projet(){
        return $this->belongsTo(Projet::class);
    }


}
