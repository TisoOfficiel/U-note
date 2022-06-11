<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cours;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Affichage de la page dashboard admin
    public function showDashboard(){
        $newuserslatest = User::where('type','NULL')->orderBy('id','desc')->take(3)->get();
        $newuserscount=User::where('type','NULL')->count();
        return view('admin.dashboard',['newuserslatest'=>$newuserslatest,'newuserscount'=> $newuserscount]);
    }
                    // Début UTILISATEUR

    // Affichage de la page utilisateur
    public function ShowUser(){
        $users=User::where('type','<>','NULL')->get();
        $newuserscount=User::where('type','NULL')->count();
        $newusers = User::where('type','NULL')->get();
        $newuserslatest = User::where('type','NULL')->orderBy('id','desc')->take(3)->get();
       
        $allCount =User::where('type','<>','NULL')->count();
        $enseignantCount = User::where('type','enseignant')->count();
        $gestionnaireCount = User::where('type','gestionnaire')->count();
        $adminCount = User::where('type','admin')->count();
        return view('admin.collection.user.userall',['newusers'=>$newusers,'newuserslatest'=>$newuserslatest,'newuserscount'=> $newuserscount,'users'=>$users,'allCount'=> $allCount,'enseignantCount'=>$enseignantCount,'gestionnaireCount'=>$gestionnaireCount,'adminCount'=>$adminCount]);
    }

    // Recherche d'un utilisateur dans la seach bar
    public function SeachUser(Request $request){
        $newuserscount=User::where('type','NULL')->count();
        $newusers = User::where('type','NULL')->get();
        $newuserslatest = User::where('type','NULL')->orderBy('id','desc')->take(3)->get();
        $allCount =User::where('type','<>','NULL')->count();
        $enseignantCount = User::where('type','enseignant')->count();
        $gestionnaireCount = User::where('type','gestionnaire')->count();
        $adminCount = User::where('type','admin')->count();
        $users = User::where('type','<>','NULL')->where($request->recherche,$request->seachbar)->get();
        session()->flashInput($request->input());
        return view('admin.collection.user.userall',['newusers'=>$newusers,'newuserslatest'=>$newuserslatest,'newuserscount'=> $newuserscount,'users'=>$users,'allCount'=> $allCount,'enseignantCount'=>$enseignantCount,'gestionnaireCount'=>$gestionnaireCount,'adminCount'=>$adminCount]);
    }

    // Filtrer des utilisateurs en fonctions de leur type
    public function FilterUser(Request $request){
        
        switch ($request->typeFilter) {
            case 'all':
                session()->flashInput($request->input());
                return redirect()->route('admin.ShowUser');
                break;
            case 'enseignant':
                session()->flashInput($request->input());
                $users=User::where('type','enseignant')->get();
                break;
            case 'gestionnaire':
                session()->flashInput($request->input());
                $users=User::where('type','gestionnaire')->get();
                break;
            case 'admin':
                session()->flashInput($request->input());
                $users=User::where('type','admin')->get();
                break;
            
            default:
                $users=User::where('type','<>','NULL')->get();
                
                break;
        }
        $allCount =User::where('type','<>','NULL')->count();
        $newusers = User::where('type','NULL')->get();
        $newuserslatest = User::where('type','NULL')->orderBy('id','desc')->take(3)->get();
        $newuserscount=User::where('type','NULL')->count();
        $enseignantCount = User::where('type','enseignant')->count();
        $gestionnaireCount = User::where('type','gestionnaire')->count();
        $adminCount = User::where('type','admin')->count();
        return view('admin.collection.user.userall',['newusers'=>$newusers,'newuserslatest'=>$newuserslatest,'newuserscount'=> $newuserscount,'users'=>$users,'allCount'=> $allCount,'enseignantCount'=>$enseignantCount,'gestionnaireCount'=>$gestionnaireCount,'adminCount'=>$adminCount]);
    }
    
    // Ajouter un utilisateur 
    public function AddUser(Request $request){
        $request->validate([
            'nom' => 'required|string',
            'prenom'=>'required|string',
            'login' => 'required|string',
            'mdp' => 'required|string' 
        ]);

        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->login = $request->login;
        $user->type = $request->role;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
        
        return redirect()->route('admin.ShowUser');
    }
    
    // Editer un utilisateur 

    public function EditUser(Request $request,$id){
        
        $request->validate([
            'Newnom' => 'required|string',
            'Newprenom'=>'required|string',
            'Newlogin' => 'required|string',
        ]);
        
        
        $user = User::findorfail($id);
        $user->nom = $request->Newnom;
        $user->prenom = $request->Newprenom;
        $user->login = $request->Newlogin;
        $user->type = $request->Newrole;
        if($request->Newmdp!=null){
            $user->mdp = Hash::make($request->Newmdp);
        }

        $user->save();
        
        return redirect()->route('admin.ShowUser');
    }

    // Supprimer un utilisateur et ignorer un utilisateur
    public function DeleteUser(Request $request,$id){
        $user = User::findorfail($id);
        
         foreach($user->cours as $cours){
            $user->cours()->detach($cours);  
        }
        
        $user->delete();
        return redirect()->route('admin.ShowUser');
    }
    

    // Affichage de la page utilisateur récent
    public function ShowUserRecent(){
        $users = User::where('type','NULL')->get();
        $newuserslatest = User::where('type','NULL')->orderBy('id','desc')->take(3)->get();
        $newuserscount=User::where('type','NULL')->count();
        return view('admin.collection.user.userrecent',['users'=>$users,'newuserscount'=>$newuserscount,'newuserslatest'=>$newuserslatest]);
    }

    // Accepter un utilisateur
    public function AcceptNewUser(Request $request,$id){
        
        $user = User::findorfail($id);
        $user->type = $request->Newrole;
        $user->save();
        return redirect()->route('admin.ShowUser');
    }

                    // Fin UTILISATEUR

                    // Début COURS

    // Affichage des cours
    public function ShowCours(){
        $cours=Cours::all();
        $users = User::where('type','NULL')->get();
        $newuserslatest = User::where('type','NULL')->orderBy('id','desc')->take(3)->get();
        $newuserscount=User::where('type','NULL')->count();
        return view('admin.collection.cours.coursall',['cours'=>$cours,'users'=>$users,'newuserscount'=>$newuserscount,'newuserslatest'=>$newuserslatest]);
    }

    // Ajout d'un cours
    public function AddCours(Request $request){

        $request->validate([
            'intitule' => 'required|string',
        ]);

        $cours = new Cours();
        $cours->intitule = $request->intitule;
        $cours->save();
        
        return redirect()->back();

    }

    // Modification cours
    public function EditCours(Request $request,$id){

    $request->validate([
        'Newintitule' => 'required|string',
    ]);
    $cours = Cours::findorfail($id);
    $cours->intitule = $request->Newintitule;
    $cours->save();
    return redirect()->back();
    }

    // Suppression cours
    public function DeleteCours(Request $request,$id){
        $cours = Cours::findorfail($id);
        foreach($cours->seances as $seance){
            $seance->etudiants()->detach();
            $seance->delete();
        }
        
        foreach($cours->users as $enseignant){
            $cours->users()->detach($enseignant);  
        }
        foreach($cours->etudiants as $etudiant){
            $cours->etudiants()->detach($etudiant);  
        }
        
        $cours->delete();

        return redirect()->back();
    }
}



