<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="https://kit.fontawesome.com/b810cfe231.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@300&family=Ubuntu&display=swap" rel="stylesheet">

    @yield('LINKCSS')
    <title>@yield('title')</title>
</head>
<body>
    
    @yield('content')
    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
    @endif

    <script type="text/javascript" src="{{URL::asset('/js/app.js')}}"></script>
</body>
</html>