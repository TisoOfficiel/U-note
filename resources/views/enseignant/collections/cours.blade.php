@extends('layout.enseignant-nav')

@section('content')
<a href="{{ route('enseignant.ShowSeances',['id'=>$cours->id]) }}">Seances</a>
<p> {{ $total }}</p>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>N° Etudiant</th>
            </tr>
        </thead>
        @foreach ($cours->etudiants as $etudiants)
            <tr>
                <td>
                    {{ $etudiants->nom }}
                </td>
                <td>
                    {{ $etudiants->prenom }}
                </td>
                <td>
                    {{ $etudiants->noet }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection