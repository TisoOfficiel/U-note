@extends('layout.admin-nav')

@section('LINKCSS')
<link rel="stylesheet" href="{{ asset('css/admin/collections/users/user.css') }}">
@endsection

@section('content')
    
    <div class="body-container">
        
        
        <div class="header">
            <div class="header-categorie">
                <i class="fa-solid fa-bars query" onclick="slidemenu()"></i>
                <h4><a href="{{ route ('admin.ShowUser')}}" >Utilisateur</a></h4>
                <h4><a href="#" class="link_page-active">Utilisateur Récent</a></h4>
            </div>
            
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
                    <button class="edit" onclick="acceptNewUser('{{$user->id}}','{{$user->nom}}','{{ $user->prenom }}')">Accepter</button>
                    <button class="delete" onclick="ignoreNewUser('{{$user->id}}','{{$user->nom}}','{{ $user->prenom }}')">Ignorer</a></button>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>

@endsection
