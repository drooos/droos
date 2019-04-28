<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Droos</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link rel ="stylesheet" href="css/libs/rtl.min.css" rel="stylesheet">
        <link rel ="stylesheet" href =  {{ URL::asset('css/reset.css') }}       > <!-- CSS reset -->
        <link rel ="stylesheet" href =  {{ URL::asset('css/style.css') }}       > <!-- Resource style -->
        <link rel ="stylesheet" href =  {{ URL::asset('css/libs/all.css') }}    >
        <link rel ="stylesheet" href =  {{ URL::asset('css/dashStyle.css') }}   >
    </head>

    <body>
        <div class="row">
            <div class="side">
                @include('includes.components.sidebar')
            </div>
            <div class=" test cont">
                @include('includes.components.dashNav')
                @yield('homeContent')
            </div>
        </div>

<script src =    {{ URL::asset('js/modernizr.js') }}        ></script>
<script src =    {{ URL::asset('js/jquery-3.0.0.min.js') }} ></script>
<script src =    {{ URL::asset('js/main.js') }}             ></script> 
<script src =    {{ URL::asset('js/app.js') }}              ></script>
<script src =    {{ URL::asset('js/signup.js') }}           ></script>

    </body>
</html>
