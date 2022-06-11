@extends('layout.app')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/auth/loginV2.css') }}">
@endsection

@section('content')
    
    <main>
        <div class="container">
            <h2>Se connecter.</h2>
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

                    <form action="{{ route('login.Login') }}" method="post">
                        @csrf
                        <div class="form-group form-input">
                            
                            <label for="Login" class="fa-solid fa-user"></label>
                            <input type="text" name="login" id ="Login" placeholder="Login">
                        </div>

                        <div class="form-group form-input">
                            <label for="Password" class="fa-solid fa-lock"></label>
                            <input type="password" name="mdp" id ="Password" placeholder="Mot de passe">
                            
                            <i id="passwordNotVisble" class="material-icons passwordNotVisble" onclick="visiblemdplogin()" style="color : #b9b3b3; margin-right:15px;">visibility_off</i>
                        </div>
                        
                        <div class="form-group form-button">
                            <input type="submit" value="Se Connecter" class="form-submit">
                        </div>
                    </form>
                    <p class="text-link">Pas de compte ? <a href="{{ route('register.ShowForm') }}" class="link-text">Créer un compte</a></p>
                    <a href="" class="link-text">Mot de passe oublier ?</a>
                </div>
                <div class="circle circle1 circle-gradient"></div>
                <div class="circle circle2 circle-black"></div>
        </div>
        
    </main>
@endsection