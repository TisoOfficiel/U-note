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

    <nav>
        <div class="left">
            <button class="menu-button" onclick="slidemenu()"><i class="fa-solid fa-bars"></i></button>                                 
            <a href="{{ route('enseignant.ShowDashboard') }}" class="link_page link_page-active"><i class="material-icons">dashboard</i>Dashboard</a>
        </div>       
    </nav>

    <main>
        <div class="menu_vetical-container" id="menu_vetical-container">
            <i class="fa-solid fa-xmark closemodal closemenuleft" onclick="closemenu()"></i>
            <menu>
                <h4>Collections</h4>
                <ul>
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
            <a href="{{ route('enseignant.ShowDashboard') }}"><i class="material-icons">dashboard</i></a>
            <a href="#"><i class="material-icons">library_books</i></a>
            
            <a href="{{ route('enseignant.ShowDashboard') }}"><button class="btn_add-fast" style="margin:0"><i class="fa-solid fa-plus"></i></button></a>
           
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