<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthentificationController extends Controller
{

    public function Accueil(){
        
    }
    public function ShowForm(){
        return view('auth.loginFormV2');
    }

    public function Login(Request $request){    
        
        if(Auth::check()){
            Auth::logout();

            $request->session()->invalidate();
    
            $request->session()->regenerateToken();

        }
        

        $request->validate([
            'login' => 'required|string',
            'mdp' => 'required|string' 
        ]);
        
        $credentials = ['login' => $request->input('login'), 'password' => $request->input('mdp')];

        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate();
            
        }

        if(Auth::check()){
            switch (Auth::user()->type){
                case ("admin"):
                    return redirect()->route('admin.ShowDashboard');
                    break;
                case('gestionnaire'):
                    return redirect()->route('gestionnaire.ShowDashboard');
                    break;
                case('enseignant');
                    return redirect()->route('enseignant.ShowDashboard');
                    break;
                case ("null"):
                    return redirect()->intended('/');
                    break;
                default:
                    return redirect()->intended('/');
                    break;
            }
        }

     
        return back()->withErrors([
        'login' => 'The provided credentials do not match our records.',
        ]); 
    }

    public function Logout(Request $request){
       
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
