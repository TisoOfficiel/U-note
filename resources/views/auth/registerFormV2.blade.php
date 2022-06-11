@extends('layout.app')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/auth/registerV2.css') }}">
@endsection

@section('content')
    
    <main>
        <div class="container">
            <h2>S'inscrire.</h2>
                <div class="form-container">
                    <div class="other-connexion">
                        
                        <a href="" class="google-link">
                            <i class="fa-brands fa-google"></i>
                           Continuer avec Google
                        </a>
                        <a href="">
                            <i class="fa-brands fa-facebook"></i>
                            Continuer avec Facebook
                        </a>
                        <p class="separation">or</p>
                    </div>

                    <form action="{{ route('register.Create') }}" method="post">
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
                        
                        <div class="form-group form-button">
                            <input type="submit" value="S'inscrire" class="form-submit">
                        </div>
                    </form>
                    <p class="text-link">Déja un compte ? <a href="{{ route('login.ShowForm') }}" class="link-text">Se connecter</a></p>
                    
                </div>
                <div class="circle circle1 circle-gradient"></div>
                <div class="circle circle2 circle-black"></div>
        </div>
        
    </main>
@endsection