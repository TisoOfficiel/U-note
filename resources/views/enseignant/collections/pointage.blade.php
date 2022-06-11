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
                <h4><a href="#" class="link_page-active">Étudiant</a></h4>
            </div>
        </div>   
        
        <div class="table-container">
            <div class="table1">
                <table>
                    <caption>Tout les étudiants du cours</caption>
                    <thead>
                        <tr>
                            <th><input style="visibility:hidden" type="submit" form="form1" value="Pointer" id="pointer"></th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>N° Etudiant</th>
            
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('enseignant.AddPresent',['id'=>$cours->id,'sid'=>$seance->id]) }}" method="POST" id="form1">
                            @csrf
                            @foreach ($cours->etudiants as $etudiants)
                                <tr>
                                    <td><input type="checkbox" name="pointage[]" value=" {{ $etudiants->id }}" onchange="pointage()"></td>
                                    <td>{{ $etudiants->nom }}</td>
                                    <td>{{ $etudiants->prenom }}</td>
                                    <td>{{ $etudiants->noet }}</td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
            <div class="table2">    
                <table>
                    <caption>Liste des présents</caption>
                    <thead>
                        <tr>
                            <th><input style="visibility:hidden" type="submit" form="form2" value="Depointer" id="depointer"></th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>N° Etudiant</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('enseignant.DeletePresent',['id'=>$cours->id,'sid'=>$seance->id]) }}" method="POST" id="form2">
                            @csrf
                            @foreach ($seance->etudiants as $etudiants)
                                <tr>
                                    <td><input type="checkbox" name="depointage[]" value=" {{ $etudiants->id }}" onchange="depointage()"></td>
                                    <td>{{ $etudiants->nom }}</td>
                                    <td>{{ $etudiants->prenom }}</td>
                                    <td>{{ $etudiants->noet }}</td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
            <div class="table3"> 
                <table>
                    <caption>Liste des abscents</caption>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>N° Etudiant</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($abscents as $abscent)
                                <tr>
                                    <td>{{ $abscent->nom }}</td>
                                    <td>{{ $abscent->prenom }}</td>
                                    <td>{{ $abscent->noet }}</td>
                                </tr>
                            @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




