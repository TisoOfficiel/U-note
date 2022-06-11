<?php

namespace App\Models;

use App\Models\User;
use App\Models\Seance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cours extends Model
{
    use HasFactory;
    protected $table = 'cours';

    function seances(){
        return $this->hasMany(Seance::class);
    }

    function etudiants(){
        return $this->belongsToMany(Etudiant::class, 'cours_etudiants', 'cours_id', 'etudiant_id');
    }

    function users(){
        return $this->belongsToMany(User::class, 'cours_users', 'cours_id', 'user_id');
    }
}
