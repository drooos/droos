<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Droos</title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
        <link rel ="stylesheet" href={{ URL::asset("css/libs/rtl.min.css") }} rel="stylesheet">
        <link rel ="stylesheet" href =  {{ URL::asset('css/style.min.css') }}       > <!-- CSS reset -->
        <link rel ="stylesheet" href =  {{ URL::asset('css/mdb.min.css') }}       > <!-- CSS reset -->
        <link rel ="stylesheet" href =  {{ URL::asset('css/reset.css') }}       > <!-- CSS reset -->
        <link rel ="stylesheet" href =  {{ URL::asset('css/style.css') }}       > <!-- Resource style -->
        <link rel ="stylesheet" href =  {{ URL::asset('css/datepicker.css') }}    >
        <link rel ="stylesheet" href =  {{ URL::asset('css/dashStyle.css') }}   >
        <link rel ="stylesheet" href =  {{ URL::asset('css/libs/all.css') }}    >
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

    <body class="black-skin">
        <div class="row">
            <div class="side">
                @include('includes.components.sidebar')
            </div>
            <div class=" test cont">
                @include('includes.components.dashNav')
                @yield('homeContent')
            </div>
        </div>

<script src =    {{ URL::asset('js/modernizr.js')               }}  ></script>
<script src =    {{ URL::asset('js/popper.min.js')              }}  ></script>
<script src =    {{ URL::asset('js/jquery-3.4.0.min.js')        }}  ></script>
<script src =    {{ URL::asset('js/bootstrap.min.js')           }}  ></script>
<script src =    {{ URL::asset('js/mdb.min.js')                 }}  ></script>
<script src =    {{ URL::asset('js/main.js')                    }}  ></script> 
<script src =    {{ URL::asset('js/app.js')                     }}  ></script>
<script src =    {{ URL::asset('js/moment.js')                  }}  ></script>
<script src =    {{ URL::asset('js/bootstrap.bundle.min.js')    }}  ></script>
<script src =    {{ URL::asset('js/bootstrap-datepicker.js')    }}  ></script>
<script src =    {{ URL::asset('js/signup.js')                  }}  ></script>
    </body>
</html>

