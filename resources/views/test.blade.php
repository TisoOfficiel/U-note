@extends('layout.enseignant-nav')

@section('content')
    @foreach ( $coursColler->etudiants as $etudiant)
        <p>{{ $etudiant->id }}</p>        
    @endforeach
@endsection