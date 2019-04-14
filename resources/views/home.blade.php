<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Droos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        
        <link href="../css/libs/rtl.min.css" rel="stylesheet">
    
        <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
    
        <link href="../css/libs/all.css" rel="stylesheet">
        <link href="../css/dashStyle.css" rel="stylesheet">

        

    </head>
    <body>
        <div class="row">
            <div class="side">
                @include('dashboard.components.sidebar')
            </div>
            <div class=" test cont">
                @include('dashboard.components.dashNav')
                @yield('homeContent')
            </div>
        </div>

<script src="js/modernizr.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->    



<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/signup.js') }}"></script>
    </body>
</html>
