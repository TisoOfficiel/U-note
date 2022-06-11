@extends('layout.admin-nav')

@section('LINKCSS')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endsection

@section('content')    
        <div class="container">
            <div class="content">
                <header>
                    <h5>Dashboard</h5>
                    <i class="fa-solid fa-ellipsis"></i>
                </header>

                <h1>
                    Bonjour,
                    <br>
                    {{ Auth::user()->nom }}
                    {{ Auth::user()->prenom }}
                </h1>
            </div>
        </div>
@endsection