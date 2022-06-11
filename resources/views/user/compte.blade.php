@extends('layout.app')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/auth/registerV2.css') }}">
@endsection

@section('content')
    
    <main>
        <div class="container">
            <h2>Compte {{ $user->nom }} {{ $user->prenom }}</h2>
                <div class="form-container">
                    <form action="{{ route('user.EditCompte') }}" method="post">
                        @csrf
                        <div class="form-group form-input">
                            <input type="text" name="Newnom" id ="nom" placeholder="Nom" value="{{$user->nom}}">
                        </div>
    
                        <div class="form-group form-input">
                            <input type="text" name="Newprenom" id ="prenom" placeholder="Prénom" value="{{$user->prenom}}">
                        </div>
    
                        <div class="form-group form-input">                        
                            <input type="text" name="Newlogin" id="login" placeholder="Login" value="{{$user->login}}">
                        </div>
    
                        <div class="form-group form-input">
                            <input type="password" name="Newmdp" id="mdp" placeholder="Mot de passe">
                        </div>
    
                        
                        <div class="form-group form-button">
                            <input type="submit" value="Modifier" class="form-submit">
                        </div>
                    </form>                    
                </div>
                <div class="circle circle1 circle-gradient"></div>
                <div class="circle circle2 circle-black"></div>
        </div>
    </main>
@endsection