@extends('layout.app')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
<section class="RegisterForm">
    
    <div class="container">
        <div class="singin-content">
            <div class="singin-image">
                <figure>
                    <img src="/img/loginVector.jpg" alt="">
                </figure>
                <a href="{{route('register.ShowForm')}}" class="singin-image-link">Je n'ai pas de compte</a>
            </div>
            <div class="singin-form">
                <h2 class="form-title">Se connecter</h2>
                <form action="{{route('login.Login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="Login" class="material-icons">person</label>
                        <input type="text" name="login" id ="Login" placeholder="Login">
                    </div>

                    <div class="form-group">
                        <label for="Password" class="material-icons">lock</label>
                        <input type="password" name="mdp" id ="Password" placeholder="Mot de passe">
                    </div>
                    
                    <div class="form-group form-button">
                        <input type="submit" value="Se Connecter" class="form-submit">
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Ou se connecter avec</span>
                    <ul class="socials">
                        <li class="facebook"><img src="https://img.icons8.com/fluency/32/000000/facebook.png"></li>
                        <li class="twitter"><img src="https://img.icons8.com/fluency/32/000000/twitter.png"></li>
                        <li class="google"><img src="https://img.icons8.com/color/32/000000/google-logo.png"></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>

</section>
@endsection