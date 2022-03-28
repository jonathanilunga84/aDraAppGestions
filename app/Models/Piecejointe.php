<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piecejointe extends Model
{
    use HasFactory;
    protected $fillable = ['agent_id','nomPiecejointe','documentsAgnet'];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}