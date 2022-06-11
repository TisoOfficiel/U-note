@extends('layout.app')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('content')
<section class="RegisterForm">
    
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">S'inscrire</h2>
                <form action="{{route('register.Create')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="nom" id ="nom" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <input type="text" name="prenom" id ="prenom" placeholder="Prénom">
                    </div>

                    <div class="form-group">                        
                        <input type="text" name="login" id="login" placeholder="Login">
                    </div>

                    <div class="form-group">
                        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                    </div>

                    <div class="form-group">
                        <input type="password" name="mdp_confirmation" id="mdp_confirmation" placeholder="Mot de passe confirmation">
                    </div>
                    
                    <div class="form-group form-button">
                        <input type="submit" value="S'inscrire" class="form-submit">
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure>
                    <img src="/img/registerVector.jpg" alt="">
                </figure>
                <a href="{{route('login.Login')}}" class="signup-image-link">J'ai déja un compte</a>
            </div>
        </div>
    </div>

</section>
@endsection