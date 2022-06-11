@extends('layout.enseignant-nav')
@section('LINKCSS')
<link rel="stylesheet" href="{{ asset('css/admin/collections/cours/cours.css') }}">
<link rel="stylesheet" href="{{ asset('css/gestionnaire/collections/association&dissociation.css')}}">
@endsection
@section('content')
<div class="body-container">

    <div class="header">
        <div class="header-categorie">
            <i class="fa-solid fa-bars query" onclick="slidemenu()"></i>
            <h4><a href="#" class="link_page-active">Détail présent</a></h4>
        </div>
    </div>   
    
    <div class="table-container">
        <div class="table1">
            <table >
                <caption>Tout les étudiants</caption>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>N° Étudiant</th>
                        <th>Nb Présence/ Nb Séance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cours->etudiants as $etudiants)
                        <tr>
                            <td>{{ $etudiants->nom }}</td>
                            <td>{{ $etudiants->prenom }}</td>
                            <td>{{ $etudiants->noet }}</td>
                            @php
                                $TotalPresent = 0
                            @endphp
                            @foreach ($etudiants->seances as $seance)
                                @if ($seance->cours_id == $cours->id)
                                    
                                @php $TotalPresent ++;
                                @endphp
                                @endif
                            @endforeach
                          
                            <td>{{ $TotalPresent }}/{{ $seanceCount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection