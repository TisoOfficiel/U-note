<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://kit.fontawesome.com/b810cfe231.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@300&family=Ubuntu&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/admin/nav-admin.css') }}"> 
    @yield('LINKCSS')
    <title>@yield('title')</title>
</head>
<body id="body">
    <div id="modal_background-container"class="modal_background-container">
        <div class="modal-container">
            <div id="add_etudiant" class="add-user">
                <div class="add-userheader">
                    <h2>Ajouter un étudiant</h2>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>

                <form action="{{ route('gestionnaire.AddEtudiant') }}" method="post">
                    @csrf
                    <div class="form-group form-input">
                        <input type="text" name="nom" id ="nom" placeholder="Nom">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="text" name="prenom" id ="prenom" placeholder="Prénom">
                    </div>
    
                    <div class="form-group form-input">                        
                        <input type="text" name="numeroEtudiant" id="numeroEtudiant" placeholder="N° étudiant">
                    </div>
       
                    <div class="form-group form-button">
                        <input type="submit" value="Ajouter l'étudiant" class="form-submit">
                    </div>
                </form>
            </div>


            <div id="edit_etudiant" class="edit-user">
                <div class="edit-userheader">
                    <h2>Modifier l'étudiant</h2>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="FormEditEtudiant" action="" method="post">
                    @csrf
                    <div class="form-group form-input">
                        <input type="text" name="Newnom" id ="Newnom" placeholder="Nom" value="">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="text" name="Newprenom" id ="Newprenom" placeholder="Prénom" value="">
                    </div>
    
                    <div class="form-group form-input">                        
                        <input type="text" name="NewNumeroEtudiant" id="NewNumeroEtudiant" placeholder="N° étudiant" value="">
                    </div>
    
                    <div class="form-group form-button">
                        <input type="submit" value="Modifier l'étudiant" class="form-submit">
                    </div>
                </form>
            </div>
            
            @if((request()->is('gestionnaire/collections/cours/*')))

            <div id="addSeance" class="edit-user">
                <div class="edit-userheader">
                    <h3>Ajouter un séance</h3>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                
                <form action="{{ route('gestionnaire.AddSeances', ['id'=> request()->route('id')]) }}" method="post">
                    @csrf
                    <label for="datedebut">Date de début</label>
                    <div class="form-group form-input">
                        <input type="datetime-local" name="datedebut" step="1" id="datedebut">
                    </div>

                    <label for="datefin">Date de fin</label>
                    <div class="form-group form-input">
                        <input type="datetime-local" name="datefin" id ="datefin" step="1" placeholder="Nom du cours" value="">
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" value="Créer la séance" class="form-submit">
                    </div>
                </form>
            </div>
            @endif

            <div id="edit_seance" class="edit-user">
                <div class="edit-userheader">
                    <h2>Modifier une séance</h2>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="FormEditSeance" action="" method="post">
                    @csrf
                    <label for="datedebut">Date de début</label>
                    <div class="form-group form-input">
                        <input type="datetime-local" name="datedebut" step="1" id="datedebut">
                    </div>

                    <label for="datefin">Date de fin</label>
                    <div class="form-group form-input">
                        <input type="datetime-local" name="datefin" step="1" id ="datefin" value="">
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" value="Modifier la séance" class="form-submit">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <nav>
        <div class="left">
            <button class="menu-button" onclick="slidemenu()"><i class="fa-solid fa-bars"></i></button>                                 
            <a href="{{ route('gestionnaire.ShowDashboard') }}" {!! (Request::is('gestionnaire/dashboard') ? ' class="link_page link_page-active"' : 'class="link_page"') !!}><i class="material-icons">dashboard</i>Dashboard</a>
            <a href="#" {!! (Request::is('gestionnaire/collections') || Request::is('gestionnaire/collections/*') ? ' class="link_page link_page-active"' : 'class="link_page"') !!}><i class="material-icons">library_books</i>Collections</a>
        </div>
    
        <div class="right">
            @if(Request::url() != ('http://127.0.0.1:8000/gestionnaire/dashboard'))
                @if(request()->is('gestionnaire/collections/cours/*/seances') || request()->is('gestionnaire/collections/etudiant'))
                  
                    <button  {{ (request()->is('gestionnaire/collections/cours/*/seances')) ? 'onclick=openAddSeance()' : 'onclick=openAddEtudiant()' }} class="btn_add-fast"><i class="fa-solid fa-plus"></i></button>
                @endif
            @endif
        </div>
    </nav>

    <main>
        <div class="menu_vetical-container" id='menu_vetical-container'>
            <menu>
                <i class="fa-solid fa-xmark closemodal closemenuleft" onclick="closemenu()"></i>
                <h4>Collections</h4>
                <ul>
                    <li {!! (Request::is('gestionnaire/collections/etudiant') || Request::is('gestionnaire/collections/etudiant/*') ? ' class="collection-active"' : '') !!}>
                      <a href="{{ route('gestionnaire.ShowEtudiant') }}" >
                          <div class="icon-container icon-utilisateur">
                             <i class="fa-solid fa-users"></i>
                          </div>
                        Étudiant</a>
                    </li>
                   
                    <li {!! (Request::is('gestionnaire/collections/cours') || Request::is('gestionnaire/collections/cours/*') ? ' class="collection-active"' : '') !!}>
                      <a href="{{ route('gestionnaire.ShowCours') }}">
                          <div class="icon-container icon-cours">
                              <i class="fa-solid fa-book-open"></i>
                          </div>
                      Cours</a>
                    </li>
                   
                    <li>
                      <a href="{{ route('user.ShowCompte') }}">
                          <div class="icon-container icon-personnal">
                              <i class="fa-solid fa-user"></i>
                          </div>
                      Mon compte</a>
                    </li>
                    <li>
                        <a href="{{ route('logout.Logout') }}">
                            <div class="icon-container icon-deco">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </div>
                        Se déconnecter</a>
                      </li>
                </ul>
            </menu>
        </div>
        @yield('content')

        <div class="mobile-menu">
            <a href="{{ route('gestionnaire.ShowDashboard') }}"><i class="material-icons">dashboard</i></a>
            <a href="#"><i class="material-icons">library_books</i></a>
            @if(Request::url() != ('http://127.0.0.1:8000/gestionnaire/dashboard'))
                @if(request()->is('gestionnaire/collections/cours/*/seances') || request()->is('gestionnaire/collections/etudiant'))
                  
                    <button  {{ (request()->is('gestionnaire/collections/cours/*/seances')) ? 'onclick=openAddSeance()' : 'onclick=openAddEtudiant()' }} class="btn_add-fast"><i class="fa-solid fa-plus"></i></button>
                @endif
            @endif
           
            <a href="{{ route('logout.Logout') }}"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </div>
    </main>

    
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
    @endif

    <script type="text/javascript" src="{{URL::asset('/js/app.js')}}"></script>
</body>
</html>