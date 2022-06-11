<?php

namespace App\Models;

use App\Models\Cours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    use HasFactory;

    function cours(){
        return $this->belongsToMany(Cours::class, 'cours_etudiants', 'etudiant_id', 'cours_id');
    }

    function seances(){
        return $this->belongsToMany(Seance::class, 'presences','etudiant_id','seance_id');
    }
}
