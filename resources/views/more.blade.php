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

        
            <h1 class="titleAccueil">Quelque info <span class="point"></span></h1>
            <div class="descriptionAccueil">
                <p>Utilisier le bouton + en haut a droite pour crée des séances,utilisateur etc</p>
                <p>Il change en fonction des pages que vous sélectionner faite attention</p>
                <p>Le responsive est censé marcher correctement,néanmoins utiliser le format ordinateur pour une meilleur expérience</p>
                <p>Dernier conseil soyez curieux regarder tout, vous trouverez toutes les réponses à vos question</p>
            </div>
            <div class="button-container">
                <a href="{{ route('register.ShowForm') }}" class="link-commencer">
                    <div>
                        Commencer
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
