@extends('layout.gestionnaire-nav')
@section('LINKCSS')
<link rel="stylesheet" href="{{ asset('css/admin/collections/cours/cours.css') }}">
@endsection

@section('content')

<div class="body-container">
        
    <div class="header">
        <div class="header-categorie">
            <i class="fa-solid fa-bars query" onclick="slidemenu()"></i>
            <h4><a href="#" class="link_page-active">Cours</a></h4>
        </div>
        <div class="seach_container">
            <div class="seach_bar-container">
                <i class="fa-solid fa-magnifying-glass seach_bar-icon"></i>
                
                <input type="text" id="seach_bar" name="seachbar" id="myInput" onkeyup="myFunction()" placeholder="Rechercher ...">   
            </div>
        </div>
    </div>   

    <div id="container-cours" class="container-cours">
        @foreach ($cours as $cours)
            <div class="container">
                <div class="content">
                    <div class="nom">
                        <p>{{ $cours->intitule }}</p>
                    </div>
                    <div class="contentmore">
                        <button class="edit"><a href="{{ route('gestionnaire.ShowPresenceCours',['id'=>$cours->id]) }}">Liste présence</a></button>
                        <button class="edit"><a href="{{ route('gestionnaire.ShowSeances',['id'=>$cours->id]) }}">Séance</a></button>
                        <button class="edit"><a href="{{ route('gestionnaire.ShowAssociation',['id'=>$cours->id]) }}">Associer / Dissocier</a></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection