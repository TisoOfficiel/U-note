<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //Affichage du formulaire d'inscription 
    public function showForm(){
        return view('auth.registerFormV2');
    }

    //Création d'un utilisateur
    public function Create(Request $request){

        $request->validate([
            'nom' => 'required|string',
            'prenom'=>'required|string',
            'login' => 'required|string',
            'mdp' => 'required|string|confirmed' 
        ]);
        
        
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        
        $user->mdp = Hash::make($request->mdp);
        $user->save();

        Auth::login($user);
        
    }

    
    
}
