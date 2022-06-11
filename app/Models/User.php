<?php

namespace App\Models;

use App\Models\Cours;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    
    protected $hidden = ['mdp'];
    
    protected $fillable = ['nom','prenom','login', 'mdp'];
    
    protected $attributes = [ 'type' => 'NULL'];
    
    public function getAuthPassword(){ 
        return $this->mdp;
    }

    public function isEnseignant(){
        return $this->type=="enseignant";
    }
    
    public function isGestionnaire(){
        return $this->type=="gestionnaire";
    }
    
    public function isAdmin(){
        return $this->type=="admin";
    }

    function cours(){
        return $this->belongsToMany(Cours::class, 'cours_users', 'user_id' ,'cours_id');
    }
    
}
