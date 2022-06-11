<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //Affichage de la page du compte
    public function ShowCompte(){
        $user = Auth::user();

        return view('user.compte',['user'=>$user]);
    }

    //Modification compte
    public function EditCompte(Request $request){
        
        $request->validate([
            'Newnom' => 'required|string',
            'Newprenom'=>'required|string',
            'Newlogin' => 'required|string',
        ]);
        
        
        $user = User::findorfail(Auth::user()->id);
        $user->nom = $request->Newnom;
        $user->prenom = $request->Newprenom;
        $user->login = $request->Newlogin;
        
        if($request->Newmdp!=null){
            $user->mdp = Hash::make($request->Newmdp);
        }
        $user->save();
       
        switch ($user->type){
            case('admin'):
                return redirect()->route('admin.ShowDashboard');
                break;
            case('gestionnaire');
                return redirect()->route('gestionnaire.ShowDashboard');
                break;
            case('enseignant');
                return redirect()->route('enseignant.ShowDashboard');
        };
       
    }

    
    // Affichage formulaire changement mot de passe
    public function ShowFormMdp(){
        return view('user.mdpForm');
    }

    //Changement de mot de passe pour utilisateur
    public function EditPassword(Request $request){ 

        $validator = Validator::make($request->all(),[
            'mdpActuel' => ['required'],
            'NewMdp' => ['required','confirmed']
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        
        $user = User::findorfail(Auth::user()->id);
         
        //Comparaison avec le mot de passe entré par l'utilisateur et celui de la base de donnée
        if (Hash::check($request->mdpActuel, Auth::user()->mdp)){
            $user->mdp = Hash::make($request->NewMdp);
            $user->save();

            return redirect()->route('register.ShowForm');
        }else{

            return redirect()->back();
        }

    }

    public function ShowFormInfo(){
        return view('user.informationUser');
    }
    
    public function EditUserInfo(Request $request){
        
        $validator = Validator::make($request->all(),[
            'NewNom' => ['required'],
            'NewPrenom' => ['required'],
            'NewLogin' => ['required']
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findorfail(Auth::user()->id);
        $user->nom = $request->NewNom;
        $user->prenom = $request->NewPrenom;
        $user->login = $request->NewLogin;

        $user->save();
        return redirect()->route('register.ShowForm');
    }
}
