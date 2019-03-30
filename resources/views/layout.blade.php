<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Droos</title>
        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link href="../css/libs/rtl.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="../css/app.css" rel="stylesheet">
    </head>
    <body>
        @include('components.nav')        
        @yield('content')
        <script src="{{ URL::asset('js/jquery-3.0.0.min.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="{{ URL::asset('js/signup.js') }}"></script>
    </body>
</html>
