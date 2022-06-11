<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\EnseignantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    
    return view('accueil');
});
Route::get('/more', function () {
    
    return view('more');
});

// Création de compte pour l'utilisateur ( Enseignant / Gestionnaire )
Route::get('/register',[RegisterController::class,'ShowForm'])->name('register.ShowForm');
Route::post('/register',[RegisterController::class,'Create'])->name('register.Create');

//Route Login/Logout
Route::get('/login',[AuthentificationController::class,'ShowForm'])->name('login.ShowForm');
Route::post('/login',[AuthentificationController::class,'Login'])->name('login.Login');
Route::get('/logout',[AuthentificationController::class,'Logout'])->name('logout.Logout');

// Pour l'enseignant
Route::middleware(['is_enseignant'])->group(function () {
    
    //Dashboard enseignant
Route::get('/enseignant/dashboard',[EnseignantController::class,'ShowDashboard'])->name('enseignant.ShowDashboard');

    //Affichage des séances pour un cours
Route::get('/enseignant/cours/{id}/seances',[EnseignantController::class,'ShowSeances'])->name('enseignant.ShowSeances');
    //Details d'une seance spécifique
Route::get('/enseignant/cours/{id}/seances/{sid}',[EnseignantController::class,'ShowSeancesDetail'])->name('enseignant.ShowSeancesDetail');
    //Ajout d'un ou plusieurs etudiants pour la présence
Route::post('/enseignant/cours/{id}/seances/{sid}/add',[EnseignantController::class,'AddPresent'])->name('enseignant.AddPresent');
    //Enlver un ou plusieurs etudiants pour la presence
Route::post('/enseignant/cours/{id}/seances/{sid}/delete',[EnseignantController::class,'DeletePresent'])->name('enseignant.DeletePresent');
    //Total de présence par séance
Route::get('/enseignant/cours/{id}/total',[EnseignantController::class,'TotalPresent'])->name('enseignant.TotalPresent');

});



// Pour l'utilisateur
    //Affichage de la page compte
Route::get('user/compte',[UserController::class,'ShowCompte'])->name('user.ShowCompte');
    // Changement d'information utilisateur
Route::post('/user/modification-compte',[UserController::class,'EditCompte'])->name('user.EditCompte');


// Pour le gestionnaire
Route::middleware(['is_gestionnaire'])->group(function () {

    // Dashboard gestionnaire
    Route::get('/gestionnaire/dashboard',[GestionnaireController::class,'ShowDashboard'])->name('gestionnaire.ShowDashboard');
    // Collection étudiant
        // Tout les étudiants avec pagination
    Route::get('/gestionnaire/collections/etudiant',[GestionnaireController::class,'ShowEtudiant'])->name('gestionnaire.ShowEtudiant');
        // Ajout d'un étudiant
    Route::post('/gestionnaire/collections/etudiant/add',[GestionnaireController::class,'AddEtudiant'])->name('gestionnaire.AddEtudiant');
        // Modification d'un étudiant
    Route::post('/gestionnaire/collections/etudiant/edit/{id}',[GestionnaireController::class,'EditEtudiant'])->name('gestionnaire.EditEtudiant');
        // Suppresion d'un étudiant
    Route::get('/gestionnaire/collections/etudiant/delete/{id}',[GestionnaireController::class,'DeleteEtudiant'])->name('gestionnaire.DeleteEtudiant');
        // Recherche d'un étudiant
    Route::post('/gestionnaire/collections/etudiant/seach',[GestionnaireController::class,'SeachEtudiant'])->name('gestionnaire.SeachEtudiant');
    
   
    // Collection Cours
    
        //Tout les cours
    Route::get('/gestionnaire/collections/cours',[GestionnaireController::class,'ShowCours'])->name('gestionnaire.ShowCours');
            
        // Seance
                // Affichage séance
    Route::get('/gestionnaire/collections/cours/{id}/seances',[GestionnaireController::class,'ShowSeance'])->name('gestionnaire.ShowSeances');
                // Ajout d'une séace
    Route::post('/gestionnaire/collections/cours/{id}/seances/add',[GestionnaireController::class,'AddSeance'])->name('gestionnaire.AddSeances');
                // Modification d'une séance
    Route::post('/gestionnaire/collections/cours/{id}/seances/edit/{sid}',[GestionnaireController::class,'EditSeance'])->name('gestionnaire.EditSeance');
                //Suppression d'une séance
    Route::get('/gestionnaire/collections/cours/{id}/seances/delete/{sid}',[GestionnaireController::class,'DeleteSeance'])->name('gestionnaire.DeleteSeance');
            
        //Page d'association pour un cours (Étudiant)
    Route::get('/gestionnaire/collections/cours/{id}/association',[GestionnaireController::class,'ShowAssociation'])->name('gestionnaire.ShowAssociation');
        //Association d'un ou plusieur étudiant
    Route::post('/gestionnaire/collections/cours/{id}/association/etudiant/add',[GestionnaireController::class,'AddAssociationEtudiant'])->name('gestionnaire.AddAssociationEtudiant');
        //Dissociation d'un ou plusieur étudiant
    Route::post('/gestionnaire/collections/cours/{id}/association/etudiants/delete',[GestionnaireController::class,'DeleteAssociationEtudiant'])->name('gestionnaire.DeleteAssociationEtudiant');
        //Page d'association pour un cours (Enseignant)
    Route::get('/gestionnaire/collections/cours/{id}/association/enseignant',[GestionnaireController::class,'ShowAssociationEnseignant'])->name('gestionnaire.ShowAssociationEnseignant');
        //Association d'un ou plusieur enseignant
    Route::post('/gestionnaire/collections/cours/{id}/association/enseignant/add',[GestionnaireController::class,'AddAssociationEnseignant'])->name('gestionnaire.AddAssociationEnseignant');
        //Dissociation d'un ou plusieur enseignant
    Route::post('/gestionnaire/collections/cours/{id}/association/enseignant/delete',[GestionnaireController::class,'DeleteAssociationEnseignant'])->name('gestionnaire.DeleteAssociationEnseignant');
         //Copier et envoyer vers les association
    Route::post('/gestionnaire/collections/cours/{id}/association/exporter',[GestionnaireController::class,'CoursExportation'])->name('gestionnaire.CoursExportation');
        //Présence Liste    
            //Présence détail d'un étudiant pour le cours
    Route::get('/gestionnaire/collections/etudiants/{id}/details/cours',[GestionnaireController::class,'ShowDetailsCours'])->name('gestionnaire.ShowDetailsCours');
            ///Présence détail d'un étudiant pour les séances 
    Route::get('/gestionnaire/collections/etudiants/{id}/details/cours/{cid}/seance',[GestionnaireController::class,"ShowDetailsSeance"])->name('gestionnaire.ShowDetailsSeance');
            //Présence par séance
    Route::get('/gestionnaire/collections/cours/{id}/seances/{sid}/presence',[GestionnaireController::class,'ShowPresenceSeance'])->name('gestionnaire.ShowPresenceSeance');
            //Présence par cours
    Route::get('/gestionnaire/collections/cours/{id}/presence',[GestionnaireController::class,'ShowPresenceCours'])->name('gestionnaire.ShowPresenceCours');
    
});
    
    //Pour l'administrateur
Route::middleware(['is_admin'])->group(function () {
        //Dashboard Admin
        Route::get('/admin/dashboard',[adminController::class,'ShowDashboard'])->name('admin.ShowDashboard');
        // Collection utilisateur
            // Tout les utilisateurs
        Route::get('/admin/collections/utilisateur',[adminController::class,'ShowUser'])->name('admin.ShowUser');
            // Recherche d'un utilisateur
        Route::post('/admin/collections/utilisateur/seach',[adminController::class,'SeachUser'])->name('admin.SeachUser');
            // Filtre de type d'utilisateur
        Route::post('/admin/collections/utilisateur/filter',[adminController::class,'FilterUser'])->name('admin.FilterUser');
            // Ajout d'un utilisateur
        Route::post('/admin/collections/utilisateur/add',[adminController::class,'AddUser'])->name('admin.AddUser');
            // Editer un utilisateur
        Route::post('/admin/collections/utilisateur/edit/{id}',[adminController::class,'EditUser'])->name('admin.EditUser');
            // Suppression d'un utilisateur
        Route::get('/admin/collections/utilisateur/delete/{id}',[adminController::class,'DeleteUser'])->name('admin.DeleteUser');
            //Acceptation de personne + attribution de role 
        Route::post('/admin/collections/utilisateur/accept/{id}',[AdminController::class,'AcceptNewUser'])->name('admin.AcceptNewUser');
            //Affichage page Utilisateur récent
        Route::get('/admin/collections/utilisateur-recent',[AdminController::class,'ShowUserRecent'])->name('admin.UserRecent');
    
        //Collection Cours
            // Tout les cours
        Route::get('/admin/collections/cours',[AdminController::class,'ShowCours'])->name('admin.ShowCours');
            // Ajout d'un cours
        Route::post('/admin/collections/cours/add',[AdminController::class,'AddCours'])->name('admin.AddCours');
            //  Modification de cours
        Route::post('/admin/collections/cours/edit/{id}',[AdminController::class,'EditCours'])->name('admin.EditCours');
            // Suppresion de cours
        Route::get('/admin/collection/cours/delete/{id}',[AdminController::class,'DeleteCours'])->name('admin.DeleteCours');
});
