@extends('layout.app')
@section('LINKCSS')
<link rel="stylesheet" href="/css/accueil.css">
@endsection
@section('content')
<header class="nav_bar-container">
    <nav class="nav_bar-content">
        <div class="left">
            <figure>
                <p style="color:white">U-note</p>
            </figure>
            <a href="" style = "text-decoration: none;color: white">Info</a>
        </div>
        <div class="right">
            <a href="{{ route('login.ShowForm') }}">Se connecter</a>
            <a href="{{ route('register.ShowForm') }}" class="link-inscription">S'inscrire</a>
        </div>
    </nav>
</header>

    <main >
        <div class="textcontainer">

        
            <h1 class="titleAccueil">U-note <span class="point"></span></h1>
            <div class="descriptionAccueil">
                <p>Gagner du temps et rendez votre vie plus facile</p>
                <p>Satisfaction c'est ce qui vous attends.</p>
            </div>
            <div class="button-container">
                <a href="{{ route('register.ShowForm') }}" class="link-commencer">
                    <div>
                        Commencer
                    </div>
                </a>
                <a href="/more" class="link-plus">
                    <div>
                        En savoir plus
                    </div>
                </a>
            </div>
        </div>
        <div class="circle circle1 circle-gradient"></div>
        <div class="circle circle2 circle-black"></div>
        <div class="circle circle3 circle-black"></div>
        <div class="circle circle4 circle-gradient"></div>
    </main>
@endsection
