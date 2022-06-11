@extends('layout.gestionnaire-nav')
@section('LINKCSS')
<link rel="stylesheet" href="{{ asset('css/admin/collections/cours/cours.css') }}">
<link rel="stylesheet" href="{{ asset('css/gestionnaire/collections/association&dissociation.css')}}">
@endsection
@section('content')
<div class="body-container">

    <div class="header">
        <div class="header-categorie">
            <i class="fa-solid fa-bars query" onclick="slidemenu()"></i>
            <h4><a href="{{ route('gestionnaire.ShowAssociation',['id'=>$cours->id]) }}">Étudiant</a></h4>
            <h4><a href="#" class=" link_page-active">Enseignant</a></h4>
        </div>

    </div>   
    
    <div class="table-container">
        <div class="table1">
            <table >
                <caption>Tout les enseignants</caption>
                <thead>
                    <tr>
                        <th> <input style="visibility: hidden;"type="submit" form="form1" value="Associer" id="associerEnseignant"></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Login</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('gestionnaire.AddAssociationEnseignant',['id'=>$cours->id]) }}" method="post" id="form1">
                        @csrf
                        @foreach ($enseignants as $enseignant)
                            <tr>
                                <td><input type="checkbox" name="associationEnseignant[]" value="{{ $enseignant->id}}" onchange="associate()"></td>
                                <td>{{ $enseignant->nom }}</td>
                                <td>{{ $enseignant->prenom }}</td>
                                <td>{{ $enseignant->login }}</td>
                            </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>
        <div class="table2">    
            <table>
                <caption>Enseignant associer au cours de {{ $cours->intitule }}</caption>
                <thead>
                    <tr>
                        <th><input style ="visibility:hidden"type="submit" form="form2" value="Dissocier" id="dissocierEnseignant"></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Login</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('gestionnaire.DeleteAssociationEnseignant',['id'=>$cours->id]) }}" method="post" id="form2">
                        @csrf
                        @foreach ($cours->users as $enseignant)
                            <tr>
                                <td><input type="checkbox" name="dissociationEnseignant[]" value="{{ $enseignant->id}} "onchange="dissociate()"></td>
                                <td>{{ $enseignant->nom }}</td>
                                <td>{{ $enseignant->prenom }}</td>
                                <td>{{ $enseignant->login }}</td>
                            </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>   
    </div>
</div>
@endsection