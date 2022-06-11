<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cours;
use App\Models\Seance;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Exists;

class EnseignantController extends Controller
{   

    //Total présent
    public function TotalPresent($id){
        $cours = Cours::findorfail($id);
        $seanceCount = $cours->seances()->count();
        return view('enseignant.collections.total',['cours'=>$cours,'seanceCount'=>$seanceCount]);
    }
    //Affichage du dashboard
    public function ShowDashboard(){
        $user = User::findorfail(Auth::user()->id);
        
        return view('enseignant.dashboard',['user'=>$user]);
    }

    //Affichade de la /des séances pour un cours
    public function ShowSeances($id){
        $cours = Cours::findorfail($id);
        $total = 0;
        foreach ($cours -> seances as $seance){
            $total +=$seance -> etudiants -> count();
        }
        $seances = $cours->seances()->orderBy('date_debut')->get()
        ->groupBy(function($seances) {
            return Carbon::parse($seances->date_debut)->format("Y-m-d");
            
        });
        
        $this->authorize('view',$cours);
        return view('enseignant.collections.seances',['cours'=>$cours,'seances'=>$seances,'total'=>$total]);
    }

    public function ShowSeancesDetail($id,$sid){
        $cours = Cours::findorfail($id);
        $seance = Seance::findorfail($sid);
        $abscents = array();
        
        if($seance->etudiants->isnotempty()){

            foreach($cours->etudiants as $etudiants){
        
                foreach($seance->etudiants as $present){
                    
                    if($present->id == $etudiants->id){
                        break;
                    }
                }
                if($present->id!=$etudiants->id){
                    array_push($abscents,$etudiants);
                }
            }
        }else{
            $abscents = $cours->etudiants;
        }
       
        $this->authorize('view',$cours);
        return view('enseignant.collections.pointage',['seance'=>$seance,'cours'=>$cours,'abscents'=>$abscents]);
    }

    public function AddPresent(Request $request,$id,$sid){
        $input = $request->all(); 
        $seance = Seance::findorfail($sid);

        foreach($input['pointage'] as $test) {
            foreach($seance->etudiants as $etudiant){
                if($etudiant->id == $test){
                    $seance->etudiants()->detach($etudiant);
                }
            }
            $etudiant = Etudiant::findorfail($test);
            $seance->etudiants()->attach($etudiant);
        }
        return redirect()->back();
    }

    //Dissociation d'un/ plusieur étudiant
    public function DeletePresent(Request $request,$id,$sid){
        $input = $request->all(); 
       
        $seance = Seance::findorfail($sid);
        
        foreach($input['depointage'] as $test) {
          
            $etudiant = Etudiant::findorfail($test);
            $seance->etudiants()->detach($etudiant);
        }

        return redirect()->back();
    }


  
}
