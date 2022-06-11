@extends('layout.enseignant-nav')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/enseignant/seance.css') }}">
@endsection

@section('content')
<div class="body-container">
    <div class="header">
        <div class="header-categorie">
            <i style ="position:relative"class="fa-solid fa-bars query " onclick="slidemenu()"></i>
            <h4><a href="{{ route('enseignant.TotalPresent',['id'=>$cours->id]) }}">Voir total détails</a></h4>
            <h4>Total présent : {{ $total }}</h4>
        </div>
    </div>
    
    <div class="ttt" id="gridSeance">
      <div class="testo">
         @foreach ($seances as $key => $seance)
            <button class="dateButton" value="{{ $key }}" onclick='TEST("{{$key}}")'>{{ date('j F Y', strtotime($key)) }}</button>
         @endforeach
      </div>
      <div id="container-cours" class="container-cours">
          @foreach ($cours->seances as $seance)
              
              <div class="container " name="{{date('Y-m-d', strtotime($seance->date_debut))}}">
                  <div class="content"> 
                      <p class="heure-debut">{{date('H:i', strtotime($seance->date_debut))}}</p>
                      <p class="heure-fin">( fin {{date('H:i', strtotime($seance->date_fin))}} )</p>
                      <p class="date-fin">Date fin: {{date('d.m.y', strtotime($seance->date_fin))}}</p>                        
                  </div>
                  <div class="contentmore">
                      <button class="edit"> <a href="{{ route('enseignant.ShowSeancesDetail',['id'=>$cours->id,'sid'=>$seance->id]) }}">Pointer</a></button>

                  </div>
              </div>
          
          @endforeach
      </div>
  </div>

</div>
@endsection