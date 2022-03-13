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
        'user_id'
    ];
}
