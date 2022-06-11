@extends('layout.app')

@section('content')

    <form action="{{route('user.EditPassword')}}" method="post">

        
        <label for="mdpActuel">Mot de passe actuel</label>
        <input type="password" name="mdpActuel" id="mdpActuel">

        <label for="NewMdp">Nouveau mot de passe</label>
        <input type="password" name="NewMdp" id="NewMdp">

        <label for="NewMdp">Mot de passe actuel</label>
        <input type="password" name="NewMdp_confirmation" id="NewMdp">

        <input type="submit" value="Envoyer">
    @csrf
    </form>

    
@endsection 