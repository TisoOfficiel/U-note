<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    public $timestamps = false;

    function cours(){
        return $this->belongsTo(Cours::class);
    }

    function etudiants(){
        return $this->belongsToMany(Etudiant::class, 'presences','seance_id','etudiant_id');
    }
}
