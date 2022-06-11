<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Cours;
use App\Models\Seance;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class GestionnaireController extends Controller
{

   
    // Affichage de la page dashboard gestionnaire
    public function showDashboard(){
        return view('gestionnaire.dashboard');
    }

                // Début ÉTUDIANT
    // Affichage de la page étudiant
    public function ShowEtudiant(){
        $etudiants = Etudiant::paginate(10);
        return view('gestionnaire.collections.etudiant',['etudiants'=>$etudiants]);
    }

    // Ajouter un étudiant
    public function AddEtudiant(Request $request){
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'numeroEtudiant' => 'required|integer|gte:0',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->noet = $request->numeroEtudiant;

        $etudiant->save();

        return redirect()->back();
    }

    // Modifier un étudiant
    public function EditEtudiant(Request $request,$id){
        $request->validate([
            'Newnom' => 'required|string',
            'Newprenom' => 'required|string',
            'NewNumeroEtudiant' => 'required|integer|gte:0',
        ]);

        $etudiant = Etudiant::findorfail($id);
        $etudiant->nom = $request->Newnom;
        $etudiant->prenom = $request->Newprenom;
        $etudiant->noet = $request->NewNumeroEtudiant;

        $etudiant->save();

        return redirect()->back();

    }

    // Suppression étudiant
    public function DeleteEtudiant($id){
        $etudiant = Etudiant::findorfail($id);        
        foreach($etudiant->cours as $cours){
            $etudiant->cours()->detach($cours);  
        }

        foreach($etudiant->seances as $seance){
            $etudiant->seances()->detach($seance);  
        }
        
        $etudiant->delete();
        return redirect()->back();
    }

    // Rechercher un étudiant
    public function SeachEtudiant(Request $request){
        $etudiant = Etudiant::where('nom',$request->seachbar)->orWhere('prenom',$request->seachbar)->orWhere('noet',$request->seachbar)->get();
        session()->flashInput($request->input());
        return view('gestionnaire.collections.etudiant',['etudiants'=>$etudiant]);
    }
    
    // Affichage détails de l'étudiants

    public function ShowDetailsCours($id){
        $etudiant = Etudiant::findorfail($id);
    
        $courspresents = array();
        foreach ($etudiant->cours as $cours){
           
            foreach ($etudiant->seances as $seance){

               
                if($cours->id==$seance->cours_id){
                    array_push($courspresents,$cours);
                }
            }
           

        }
        
        $courspresents = array_unique($courspresents);
       
        return view('gestionnaire.collections.detailsPresence.cours',['etudiant'=>$etudiant,'courspresents'=>$courspresents]);
    }

    //Affichage de la page seances présent

    public function ShowDetailsSeance($id,$cid){
        $etudiant = Etudiant::findorfail($id);
        $cours = Cours::findorfail($cid);

        $newDateTime = Carbon::now()->addHours(2)->format('Y-m-d H:i:s');

        $nbPresence = $etudiant->seances->where('cours_id',$cid)->where('date_debut','<=',  $newDateTime)->count();
        
       
        $nbAbscence = $cours->seances->where('date_debut','<=',$newDateTime)->count();       
        
        $nbAbscence = $nbAbscence - $nbPresence ;
        return view('gestionnaire.collections.detailsPresence.seance',['etudiant'=>$etudiant,'nbPresence'=>$nbPresence,'cours'=>$cours,'nbAbscence'=>$nbAbscence]);
    }

            // Fin ETUDIANT
            
            //DÉBUT COURS
    
    //Affichage des cours
    public function ShowCours(){
        $cours=Cours::all();
        return view('gestionnaire.collections.cours',['cours'=>$cours]);
    }

    //Affichage page présence pour un cours
    public function ShowPresenceCours($id){
        $cours = Cours::findorfail($id);
        $presentstable = array();
        $presents = array();

        foreach ($cours->seances as $seance){
            foreach ($seance->etudiants as $etudiants){    
                array_push($presentstable,$etudiants->id);
            }

        }
        $presentstable = array_unique($presentstable);
        foreach($presentstable as $present){
            $present = Etudiant::findorfail($present);
            array_push($presents,$present);
        }; 
        
      
        return view('gestionnaire.collections.presence.cours',['cours'=>$cours,'presents'=>$presents]);
    }

     //Association d'un cours ver l'autre
     public function CoursExportation(Request $request,$id){
        $coursCopier = Cours::findorfail($id);

        $coursColler = Cours::findorfail($request->VersCours);
        if($request->VersCours=="0"){
            return redirect()->back();
        }
        foreach($coursCopier->etudiants as $test) {
            foreach($coursColler->etudiants as $etudiant){
                if($etudiant->id == $test->id){
                    $coursColler->etudiants()->detach($etudiant);
                }
            }
            $etudiant = Etudiant::findorfail($test->id);
            $coursColler->etudiants()->attach($etudiant);
        }

        return redirect()->route('gestionnaire.ShowAssociation', ['id' => $request->VersCours]);
        
    }
            //FIN COURS

            //DÉBUT SEANCE
    //Affichage page seance
    public function ShowSeance($id){
        
        $cours = Cours::findorfail($id);

        $seances = $cours->seances()->orderBy('date_debut')->get()
        ->groupBy(function($seances) {
            return Carbon::parse($seances->date_debut)->format('d.m.y');
            
        });
        
        $seancestable = $cours->seances()->orderBy('date_debut')->paginate(6);
        
        return view('gestionnaire.collections.seance',['seances'=>$seances,'seancestable'=>$seancestable]);
    }

    //Ajouter une séance
    public function AddSeance(Request $request,$id){
        $request->validate([
            'datedebut' => 'required',
            'datefin' => 'required|string',
        ]);
        $cours = Cours::findorfail($id);
        $datedebut = str_replace('T',' ', $request->datedebut);
        $datefin = str_replace('T',' ', $request->datefin);

        $seance = new Seance();
        $seance->cours_id = $cours->id;
        $seance->date_debut = $datedebut;
        $seance->date_fin = $datefin;
        
        $cours->seances()->save($seance);

        return redirect()->back();
    }

    //Modifier une séance
    public function EditSeance(Request $request,$id,$sid){
      
        $request->validate([
            'datedebut' => 'required',
            'datefin' => 'required|string',
        ]);

        
        $seance = Seance::findorfail($sid);
      
        $datedebut = str_replace('T',' ', $request->datedebut);
        $datefin = str_replace('T',' ', $request->datefin);

    
        $seance->date_debut = $datedebut;
        $seance->date_fin = $datefin;

        $seance->save();
    
        return redirect()->back();
    }

    //Supprimer une séance
    public function DeleteSeance($id,$sid){
        
        $seance = Seance::findorfail($sid);
        foreach($seance->etudiants as $etudiant){
            $seance->etudiants()->detach($etudiant);
        }

        $seance->delete();
        
        return redirect()->back();
    }

    //Affichage liste présence pour une séance

    public function ShowPresenceSeance($id,$sid){
        $seance = Seance::findorfail($sid);

        return view('gestionnaire.collections.presence.seance',['seance'=>$seance]);
    }
                //FIN SEANCE
                // DEBUT ASSOCIATION

    //Affichage page associations
    public function ShowAssociation($id){
        $etudiants = Etudiant::all();
        $cours = Cours::findorfail($id);
        $toutcours = Cours::all();
        return view('gestionnaire.collections.association.etudiant',['etudiants'=>$etudiants,'cours'=>$cours,'toutCours'=>$toutcours]);
    }

    //Association d'un/plusieur étudiant
    public function AddAssociationEtudiant(Request $request,$id){
      
        $input = $request->all(); 
        $cours = Cours::findorfail($id);
        
        foreach($input['associationEtudiant'] as $test) {
            foreach($cours->etudiants as $etudiant){
                if($etudiant->id == $test){
                    $cours->etudiants()->detach($etudiant);
                }
            }
            $etudiant = Etudiant::findorfail($test);
            $cours->etudiants()->attach($etudiant);
        }
        return redirect()->back();
    }

    //Dissociation d'un/ plusieur étudiant
    public function DeleteAssociationEtudiant(Request $request,$id){
        $input = $request->all(); 
        $cours = Cours::findorfail($id);

        
        foreach($input['dissociationEtudiant'] as $test) {
          
            $etudiant = Etudiant::findorfail($test);
            $cours->etudiants()->detach($etudiant);
        }
        return redirect()->back();
    }

    // Affichage de la page association enseignant

    public function ShowAssociationEnseignant($id){
        $enseignants = User::where('type','enseignant')->get();
        $cours = Cours::findorfail($id);
               
        return view('gestionnaire.collections.association.enseignant',['enseignants'=>$enseignants,'cours'=>$cours]);
    }

    public function AddAssociationEnseignant(Request $request,$id){
        $input = $request->all(); 
        $cours = Cours::findorfail($id);
        
        foreach($input['associationEnseignant'] as $test) {
            foreach($cours->users as $enseignant){
                if($enseignant->id == $test){
                    $cours->users()->detach($enseignant);
                }
            }
            $enseignant = User::findorfail($test);
            $cours->users()->attach($enseignant);
        }
        
        return redirect()->back();
    }

    public function DeleteAssociationEnseignant(Request $request,$id){
        $input = $request->all(); 
        $cours = Cours::findorfail($id);

        foreach($input['dissociationEnseignant'] as $test) {
          
            $enseignant = User::findorfail($test);
            $cours->users()->detach($enseignant);
        }
        return redirect()->back();
    }

                //FIN ASSOCIATION
}
