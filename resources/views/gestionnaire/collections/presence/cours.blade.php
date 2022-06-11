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
            <h4 class="link_page-active">Liste présent: {{ $cours->intitule }}</h4>
        </div>
    </div>   
    
    <div class="table-container">
        <div class="table1">
            <table >
                <caption>Présent en {{ $cours->intitule }}</caption>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>N° Étudiant</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($presents as $present)
                    <tr>
                        <td>{{ $present->nom }}</td>
                        <td>{{ $present->prenom }}</td>
                        <td>{{ $present->noet }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection