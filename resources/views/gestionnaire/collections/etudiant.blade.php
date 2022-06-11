@extends('layout.gestionnaire-nav')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gestionnaire/collections/etudiant.css') }}">
@endsection

@section('content')    
<div class="body-container">
        
    <div class="header">
        <div class="header-categorie">
            <i class="fa-solid fa-bars query" onclick="slidemenu()"></i>
            <h4><a href="#" class="link_page-active">Étudiant</a></h4>
        </div>
        <form action="{{ route('gestionnaire.SeachEtudiant') }}" class="seach_container"method="post">
            @csrf
            <div class="seach_bar-container">

                <i class="fa-solid fa-magnifying-glass seach_bar-icon"></i>
                <input type="text" id="seach_bar" name="seachbar" placeholder="Rechercher ...">
           
            </div>
        <div class="other-container">
            <input type="submit" id="rechercher"value="Rechercher">
        </div>
        </form>
        
    </div>
    <div class="test">
        <table>
            <thead>
                <tr>    
                    <th>#ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>N° Etudiant</th>
                    <th colspan="3"></th>         
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant) 
                    <tr>
                        <td>#{{ $etudiant->id }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->noet }}</td> 
                        <td><a href="{{ route('gestionnaire.ShowDetailsCours',['id'=>$etudiant->id]) }}">Details</a></td>
                        <td><div onclick="openEditEtudiant('{{ $etudiant->id }}','{{$etudiant->nom}}','{{ $etudiant->prenom }}','{{ $etudiant->noet }}')" class="edit">Modifier</div></td>
                        <td><a href="{{ route('gestionnaire.DeleteEtudiant',['id'=>$etudiant->id]) }}" class="delete">Supprimer</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(Request::url() != ('http://127.0.0.1:8000/gestionnaire/collections/etudiant/seach'))
            <div class="pagination">             
                {{$etudiants->links('layout.pagination')}}
            </div>
        @endif
    </div>
</div>        
@endsection