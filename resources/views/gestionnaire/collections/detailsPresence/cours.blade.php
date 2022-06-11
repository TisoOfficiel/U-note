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
        @foreach ($etudiant->cours as $courspresent)
            <div class="container">
                <div class="content">
                    <div class="nom">
                        <p>{{ $courspresent->intitule }}</p>
                    </div>
                   
                    <a href="{{ route('gestionnaire.ShowDetailsSeance',['id'=>$etudiant->id,'cid'=>$courspresent->id])}}">Plus de détail</a>
                </div>
            </div>       
        @endforeach
    </div>

</div>
@endsection