@extends('layout.admin-nav')

@section('LINKCSS')
<link rel="stylesheet" href="{{ asset('css/admin/collections/users/user.css') }}">
@endsection

@section('content')   
    <div class="body-container">
        
        <div class="header">
            <div class="header-categorie">
                <i class="fa-solid fa-bars query" onclick="slidemenu()"></i>
                <h4><a href="#" class="link_page-active">Utilisateur</a></h4>
                <h4><a href="{{ route('admin.UserRecent') }}">Utilisateur Récent</a></h4>
            </div>
            <form action="{{ route('admin.SeachUser') }}" class="seach_container"method="post">
                @csrf
                <div class="seach_bar-container">

                    <i class="fa-solid fa-magnifying-glass seach_bar-icon"></i>
                    <input type="text" id="seach_bar" name="seachbar" placeholder="Rechercher ...">
               
                
                    <select name="recherche" class="select-seach-bar">
                        <option value="nom" @selected(old('recherche') == "nom")>Nom</option>
                        <option value="prenom" @selected(old('recherche') == "prenom")>Prénom</option>
                        <option value="login" @selected(old('recherche') == "login")>Login</option>
                    </select>
                </div>
            <div class="other-container">
                <input type="submit" id="rechercher"value="Rechercher">
            </div>
            </form>
            
        </div>

        <div class="filter-container">
           
            <button class="submit-filter list-grid" onclick="listgrid()">
                <i id="list-grid" class="fa-solid fa-grip"></i>
               
            </button>
            
            <form action="{{ route('admin.FilterUser') }}" method="post">
                @csrf
                @switch(Request::old('typeFilter'))
                    @case("all")
                    <button class="submit-filter submit-filter-active" type="submit" name="typeFilter" value="all">Tous ({{ $allCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="admin">Admin({{ $adminCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="enseignant">Enseignant({{ $enseignantCount}})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="gestionnaire">Gestionnaire({{ $gestionnaireCount }})</button>
                        @break
                    @case("admin")
                    <button class="submit-filter" type="submit" name="typeFilter" value="all">Tous ({{ $allCount }})</button>
                    <button class="submit-filter submit-filter-active" type="submit" name="typeFilter" value="admin">Admin({{ $adminCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="enseignant">Enseignant({{ $enseignantCount}})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="gestionnaire">Gestionnaire({{ $gestionnaireCount }})</button>
                        @break
                    @case("enseignant")
                    <button class="submit-filter" type="submit" name="typeFilter" value="all">Tous ({{ $allCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="admin">Admin({{ $adminCount }})</button>
                    <button class="submit-filter submit-filter-active" type="submit" name="typeFilter" value="enseignant">Enseignant({{ $enseignantCount}})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="gestionnaire">Gestionnaire({{ $gestionnaireCount }})</button>
                        @break
                    @case("gestionnaire")
                    <button class="submit-filter" type="submit" name="typeFilter" value="all">Tous ({{ $allCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="admin">Admin({{ $adminCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="enseignant">Enseignant({{ $enseignantCount}})</button>
                    <button class="submit-filter submit-filter-active" type="submit" name="typeFilter" value="gestionnaire">Gestionnaire({{ $gestionnaireCount }})</button>
                        @break
                    @default
                    <button class="submit-filter submit-filter-active" type="submit" name="typeFilter" value="all">Tous ({{ $allCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="admin">Admin({{ $adminCount }})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="enseignant">Enseignant({{ $enseignantCount}})</button>
                    <button class="submit-filter" type="submit" name="typeFilter" value="gestionnaire">Gestionnaire({{ $gestionnaireCount }})</button>
                @endswitch
                
            </form>
        </div>

        <div id ="container-user"class="container-user">
            @foreach ($users as $user )        
            <div class="container" >
                <div class="content">
                    <div class="profile-picture">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="nom">
                        <p>{{ $user->nom }} {{ $user->prenom }}</p>
                    </div>
                    <div class="login">
                        <p>{{ $user->login }}</p>
                    </div>
                    <div class="{{ $user->type }}">
                        <p>{{ $user->type }}</p>
                    </div>
                </div>
                <div class="contentmore">
                    <button class="edit" onclick="openEditUser('{{$user->id}}','{{$user->nom}}','{{$user->prenom}}','{{$user->login}}','{{ $user->type }}')">Modifier</button>
                    <button class="delete" ><a href="{{ route('admin.DeleteUser',['id'=>$user->id]) }}">Supprimer</a></button>
                </div>
            </div>
            
            <div class="container2" >
                <div class="content2">
                    <div class="profile-picture">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="nom">
                        <p>{{ $user->nom }} {{ $user->prenom }}</p>
                    </div>
                    <div class="login">
                        <p>{{ $user->login }}</p>
                    </div>
                
                    <div class="{{ $user->type }}">
                    <p>{{ $user->type }}</p>
                    </div>
                    <div class="contentmore-row">
                        <button class="edit" onclick="openEditUser()">Modifier</button>
                        <button class="delete" ><a href="{{ route('admin.DeleteUser',['id'=>$user->id]) }}">Supprimer</a></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>

@endsection 

