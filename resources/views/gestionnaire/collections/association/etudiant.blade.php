@extends('layout.gestionnaire-nav')
@section('LINKCSS')
<link rel="stylesheet" href="{{ asset('css/admin/collections/cours/cours.css') }}">
<link rel="stylesheet" href="{{ asset('css/gestionnaire/collections/association&dissociation.css')}}">
@endsection
@section('content')
<div class="body-container">

    <div class="header">
        <div class="header-categorie">
            <i class="fa-solid fa-bars query"  onclick="slidemenu()"></i>
            <h4><a href="#" class="link_page-active">Étudiant</a></h4>
            <h4><a href="{{ route('gestionnaire.ShowAssociationEnseignant',['id'=>$cours->id]) }}">Enseignant</a></h4>
        </div>
        <div class="seach_container">
            <div class="seach_bar-container">
                
                <form action="{{ route('gestionnaire.CoursExportation',['id'=>$cours->id]) }}" method="post">
                    @csrf
                    <label for="export">Copier les associations de {{ $cours->intitule }} vers </label>
                    <select id="export"name="VersCours" onchange='this.form.submit()'>
                        <option value="0">Choisir</option>
                        @foreach ($toutCours as $CoursColler)
                            @if ($cours->id!=$CoursColler->id)
                            <option value="{{ $CoursColler->id}}">{{ $CoursColler->intitule}}</option>
                            @endif
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>   
    
    <div class="table-container">
        <div class="table1">
           
            <table >
                <caption>Tout les étudiants</caption>
                <thead>
                    <tr>
                        <th> <input style="visibility:hidden"type="submit" form="form1" value="Associer" id="associationEtudiant"></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>N° Étudiant</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('gestionnaire.AddAssociationEtudiant',['id'=>$cours->id]) }}" method="post" id="form1">
                        @csrf
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td><input type="checkbox" name="associationEtudiant[]" value="{{ $etudiant->id}}" onchange="associateEtudiant()"></td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->noet }}</td>
                            </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>
        <div class="table2">    
            <table>
                <caption>Étudiants associer au cours de {{ $cours->intitule }}</caption>
                <thead>
                    <tr>
                        <th><input style="visibility:hidden" type="submit" form="form2" value="Dissocier" id="dissocierEtudiant"></th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>N° Étudiant</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('gestionnaire.DeleteAssociationEtudiant',['id'=>$cours->id]) }}" method="post" id="form2">
                        @csrf
                        @foreach ($cours->etudiants as $etudiant)
                            <tr>
                                <td><input type="checkbox" name="dissociationEtudiant[]" value="{{ $etudiant->id}}" onchange="dissociateEtudiant()"></td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->noet }}</td>
                            </tr>
                        @endforeach
                    </form>
                </tbody>
            </table>
        </div>   
    </div>
</div>
@endsection