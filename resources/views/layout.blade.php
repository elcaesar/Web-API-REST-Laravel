<!doctype html>
<!--     Plantilla principal del sitio web     -->
<!--     Autor: Cesar Romero                   -->
<!--     Año: 2019                             -->
<!--     Trabajo Final de Aplicación           -->
<html lang={{app()->getLocale()}}>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/facena_logo.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>@yield("title") - TFA</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- CSS Files -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap-grid.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap-reboot.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">


    <style>
        .container {

        }
        .jumbotron {
            padding-top: 90px;
        }
    </style>

</head>
<body>

    <div class="container">
        <div>
        <!--Cabecera-->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{asset('svg/facena_logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/home')}}">Home</a>
                            </li>
                            <li><a class="nav-link" href="{{route('asignaturas.list')}}">Asignaturas</a></li>
                            <li><a class="nav-link" href="{{route('docentes.list')}}">Docentes</a></li>
                            <li><a class="nav-link" href="#">Cursadas</a></li>
                        @endif

                    </ul>
                    <lu class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            @if (Auth::check())
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->usuarios()->nombre}}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Ver Usuario</a>
                                    <a class="dropdown-item" href="#">Salir</a>
                                </div>  
                            @else
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Invitado
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{url('login')}}">Login</a>
                                  <a class="dropdown-item" href="#">Registrarse</a>
                                </div>
                            @endif
                            
                            
                        </li>
                    </lu>
                </div>

            </nav>
        </div>

        <!-- Cuerpo -->
        <div class="jumbotron jumbotron-fluid" span style="width:70%;">
            <div class="container">
            <h4 class="display-6">@yield('tituloContent')</h4>
               @include('flash::message')
            <p>@yield('content')</p>

            </div>
        </div>



        <div>
            <!-- Pie -->
            <nav class="navbar navbar-dark bg-dark fixed-bottom">
                <a class="navbar-brand" href="#">
                    <small>Trabajo Final de Aplicación - Licenciatura en Sistemas de Información - UNNE - FACENA</small>
                </a>
            </nav>
        </div>
    </div>

<!--  Core JS Files   -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}" type="text/javascript"></script>

</body>
</html>