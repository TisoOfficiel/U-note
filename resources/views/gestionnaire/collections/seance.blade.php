@extends('layout.gestionnaire-nav')
@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/enseignant/seance.css') }}">
@endsection
@section('content')
<div class="body-container">
    <div class="header">
        <div class="header-categorie">
            <i class="fa-solid fa-bars query"onclick="slidemenu()"></i>
            <h4><a href="#" class="link_page-active">Seance</a></h4>
        </div>
    </div>

    <div class="ROR" id="listeSeance">
        <table>
            <thead>
                <tr>    
                    <th>#ID</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Horaire</th>
                    <th colspan="3"></th>            
                </tr>
            </thead>
            <tbody>
                @foreach ($seancestable as $seancetable)
                    <tr>
                        <td>#{{ $seancetable->id }} </td>
                        <td>{{date('Y-m-d', strtotime($seancetable->date_debut))}}</td>
                        <td>{{date('Y-m-d', strtotime($seancetable->date_fin))}}</td>
                        <td>{{date('H:i', strtotime($seancetable->date_debut))}} - {{date('H:i', strtotime($seancetable->date_fin))}}</td>
                        <td><a href="{{ route('gestionnaire.ShowPresenceSeance',['id'=>$seancetable->cours_id,'sid'=>$seancetable->id]) }}">Liste présence</a></td>
                        <td><div class="edit" onclick="openEditSeance('{{ $seancetable->cours_id }}','{{$seancetable->id}}')">Modifier</div></td>
                        <td><a href="{{ route('gestionnaire.DeleteSeance',['id'=>$seancetable->cours_id,'sid'=>$seancetable->id]) }}" class="delete">Supprimer</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if(Request::url() != ('http://127.0.0.1:8000/gestionnaire/collections/etudiant/seach'))
            <div class="pagination">             
                {{$seancestable->links('layout.pagination')}}
            </div>
        @endif
    </div>
    

</div>
@endsection