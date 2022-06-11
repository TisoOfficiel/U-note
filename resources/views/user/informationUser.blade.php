@extends('layout.app')

@section('content')
    
    <form action="" method="post">
        
        <label for="NewNom">Nom</label>
        <input type="text" name="NewNom" id="NewNom" value="{{old('NewNom')}}">

        <label for="NewPrenom">Prénom</label>
        <input type="text" name="NewPrenom" id="NewPrenom" value="{{old('NewPrenom')}}">

        <label for="NewLogin">Login</label>
        <input type="text" name="NewLogin" id="NewLogin" value="{{old('NewPrenom')}}">

        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection