@section('header')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Servicios JNET</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.mi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilo.css') }}?2" rel="stylesheet">
</head>
@stop

@section('nav')
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/home') }}">
                <img src="/imagenes/soloLogo.png" alt="" width="30" height="30">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropMenuClientes" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Clientes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropMenuClientes">
                            <a class="dropdown-item" href="{{url('/clientes')}}">Ver</a>
                            <a class="dropdown-item" href="{{url('/clientes/create')}}">Ingresar</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/pagos/create')}}">Pagos</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropMenuHerramientas" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Herramientas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropMenuHerramientas">
                            <a class="dropdown-item" href="{{ url('/usuarios') }}">Usuarios</a>
                            <a class="dropdown-item" href="{{ url('/planes') }}">Planes de Internet</a>
                            <a class="dropdown-item" href="{{ url('/pdf') }}">Generar Recibo</a>
                            <a class="dropdown-item" href="{{ url('/pdfm') }}">Recibo con mora</a>
                            <a class="dropdown-item" href="{{ url('/redireccionar') }}" target="_blank">Enviar recibo</a>
                            <a class="dropdown-item" href="{{ url('/verpagos') }}"> Ver todos los pagos</a>
                        </div>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto margen-derecho">
                    <!-- Authentication Links -->
                    @guest

                    <!--<li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif  -->
                    @else
                    <li class="nav-item dropdown">
                        
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="/storage/{{Auth::user()->picture}}" class="redondear" alt="" width="30" height="30">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(Auth::user()->roluser=='1')
                            <a class="dropdown-item" href="{{ url('/usuarios/create') }}">
                                Crear Nuevo Usuario
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Cerrar Sesion.
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                    
                    @endguest
                </ul>
            </div>
    </nav>

</div>
<br>
@stop
@section('footer')
</body>

</html>
@stop
