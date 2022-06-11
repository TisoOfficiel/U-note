@extends('layout.gestionnaire-nav')
@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/enseignant/seance.css') }}">
@endsection

@section('content')

<div class="ttt" id="gridSeance">
    
    <div id="container-cours" class="container-cours">
        <p>Présence : {{ $nbPresence }}</p>
        <p>Abscence : {{ $nbAbscence }}</p>
    </div>
   
@endsection