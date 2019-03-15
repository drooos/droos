<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Droos</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link href="../css/libs/rtl.min.css" rel="stylesheet">
        
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
        
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
