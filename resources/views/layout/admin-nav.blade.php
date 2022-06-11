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
            <div id="add-user" class="add-user">
                <div class="add-userheader">
                    <h2>Inscire un utilisateur</h2>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form action="{{ route('admin.AddUser') }}" method="post">
                    @csrf
                    <div class="form-group form-input">
                        <input type="text" name="nom" id ="nom" placeholder="Nom">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="text" name="prenom" id ="prenom" placeholder="Prénom">
                    </div>
    
                    <div class="form-group form-input">                        
                        <input type="text" name="login" id="login" placeholder="Login">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="password" name="mdp_confirmation" id="mdp_confirmation" placeholder="Mot de passe confirmation">
                    </div>
                    <select name="role" class="addrole">
                        <option  selected value="admin">Admin</option>
                        <option  value="enseignant">Enseignant</option>
                        <option  value="gestionnaire">Gestionnaire</option>
                    </select>
    
                    <div class="form-group form-button">
                        <input type="submit" value="Inscrire un utilisateur" class="form-submit">
                    </div>
                </form>
            </div>
            <div id="edit-user" class="edit-user">
                <div class="edit-userheader">
                    <h2>Modifier un utilisateur</h2>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="FormEditUser"action="" method="post">
                    @csrf
                    <div class="form-group form-input">
                        <input type="text" name="Newnom" id ="Newnom" placeholder="Nom" value="">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="text" name="Newprenom" id ="Newprenom" placeholder="Prénom" value="">
                    </div>
    
                    <div class="form-group form-input">                        
                        <input type="text" name="Newlogin" id="Newlogin" placeholder="Login" value="">
                    </div>
    
                    <div class="form-group form-input">
                        <input type="password" name="Newmdp" id="Newmdp" placeholder="Mot de passe" >
                    </div>
    
                    <div class="form-group form-input">
                        <input type="password" name="Newmdp_confirmation" id="Newmdp_confirmation" placeholder="Mot de passe confirmation">
                    </div>
                    <select name="Newrole"class="addrole">
                        <option  id="admin" value="admin">Admin</option>
                        <option  id="enseignant"value="enseignant">Enseignant</option>
                        <option  id="gestionnaire"value="gestionnaire">Gestionnaire</option>
                    </select>
    
                    <div class="form-group form-button">
                        <input type="submit" value="Modifier un utilisateur" class="form-submit">
                    </div>
                </form>
            </div>


            <div id="accept-new-user" class="edit-user">
                <div class="edit-userheader">
                    <h3 id="accept-new-user-title"></h3>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="Form-accept-new-user"action="" method="post">
                    @csrf
                    <select name="Newrole"class="addrole">
                        <option  id="admin" value="admin">Admin</option>
                        <option  id="enseignant"value="enseignant">Enseignant</option>
                        <option  id="gestionnaire"value="gestionnaire">Gestionnaire</option>
                    </select>
    
                    <div class="form-group form-button">
                        <input type="submit" value="Accepter l'utilisateur" class="form-submit">
                    </div>
                    <div class="form-group form-cancel">
                        <input type="button" value="Annuler" class="form-submit" onclick="closemodal()">
                    </div>
                </form>
            </div>

            <div id="ignore-new-user" class="edit-user">
                <div class="edit-userheader">
                    <h3>Ignorer l'utilisateur</h3>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="Form-ignore-new-user"action="" method="get">
                    @csrf
                    <div class="form-group form-button">
                        <input type="submit" value="Ignore l'utilisateur" class="form-submit">
                    </div>
                    <div class="form-group form-cancel">
                        <input type="button" value="Annuler" class="form-submit" onclick="closemodal()">
                    </div>
                </form>
            </div>

            <div id="add_cours" class="edit-user">
                <div class="edit-userheader">
                    <h2>Ajouter un cours</h2>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="Form-add-cours" action="{{ route('admin.AddCours') }}" method="post">
                    @csrf
                    <div class="form-group form-input">
                        <input type="text" name="intitule" id ="intitule" placeholder="Nom du cours">
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" value="Ajouter le cours" class="form-submit">
                    </div>
                </form>
            </div>
            <div id="edit_cours" class="edit-user">
                <div class="edit-userheader">
                    <h3 id="edit-cours-title"></h3>
                    <i class="fa-solid fa-xmark closemodal" onclick="closemodal()"></i>
                </div>
                <form id="Form-edit-cours" action="" method="post">
                    @csrf
                    <div class="form-group form-input">
                        <input type="text" name="Newintitule" id ="Newintitule" placeholder="Nom du cours" value="">
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" value="Modifier le cours" class="form-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <nav>

        <div class="left">
            <button class="menu-button"><i class="fa-solid fa-bars" onclick="slidemenu()"></i></button>                                          
            <a href="{{ route('admin.ShowDashboard') }}" {!! (Request::is('admin/dashboard') ? ' class="link_page link_page-active"' : 'class="link_page"') !!}><i class="material-icons">dashboard</i>Dashboard</a>
            <a href="{{ route('admin.ShowUser') }}"{!! (Request::is('admin/collections') || Request::is('admin/collections/*') ? ' class="link_page link_page-active"' : 'class="link_page"') !!}><i class="material-icons">library_books</i>Collections</a>
        </div>
        
        <div class="right">
            @if(Request::url() != ('http://127.0.0.1:8000/admin/dashboard'))
                <button {!! (Request::is('admin/collections/cours') ? 'onclick="openAddCours()"' : 'onclick="openAddUser()"') !!} class="btn_add-fast"><i class="fa-solid fa-plus"></i></button>
            @endif
            <div class="bell" id="bell" onclick="openRecentUser('{{ $newuserscount }}')">
                <i class="fa-solid fa-bell"></i>
                @if ($newuserscount>0)
                    <div class="notif">{{ $newuserscount }}</div>
                @endif
                <div class="notif-container" id="notif">
                    @foreach ($newuserslatest as $user)
                        <div class="notif-content">
                            <p>{{ $user->nom }} {{ $user->prenom }} veut s'inscrire</p>
                            <div class='notif-content-button'>
                                
                                <button onclick="acceptNewUser('{{$user->id}}','{{$user->nom}}','{{ $user->prenom }}')"><i class="fa-solid fa-check"></i></button>
                                <button onclick="ignoreNewUser('{{$user->id}}','{{$user->nom}}','{{ $user->prenom }}')"><i class="fa-solid fa-xmark"></i></button> 
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('admin.UserRecent') }}">
                        <div class="notif-more-content">Voir plus</div>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <div class="menu_vetical-container" id="menu_vetical-container">
            <menu>
                <i class="fa-solid fa-xmark closemodal closemenuleft" onclick="closemenu()"></i>
                <h4>Collections</h4>
                <ul>
                    <li {!! (Request::is('admin/collections/utilisateur') || Request::is('admin/collections/utilisateur-recent') ? ' class="collection-active"' : '') !!}>
                      <a href="{{ route('admin.ShowUser') }}">
                          <div class="icon-container icon-utilisateur">
                             <i class="fa-solid fa-users"></i>
                          </div>
                        Utilisateur</a>
                    </li>
                    <li {!! (Request::is('admin/collections/cours') ? ' class="collection-active"' : '') !!}>
                      <a href="{{ route('admin.ShowCours') }}">
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
            <a href="{{ route('admin.ShowDashboard') }}"><i class="material-icons">dashboard</i></a>
            <a href="{{ route('admin.ShowUser') }}"><i class="material-icons">library_books</i></a>
            <button {!! (Request::is('admin/collections/cours') ? ' onclick="openAddCours()"' : 'onclick="openAddUser()"') !!} class="btn_add-fast" style="margin:0"><i class="fa-solid fa-plus"></i></button>
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