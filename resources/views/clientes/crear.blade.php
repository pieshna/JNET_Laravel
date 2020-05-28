@include('template')
@yield('header')

<body>
    @yield('nav')

    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid bg-primary text-white">
            <h1 style="font-size: 60px;" class="text-center">Nuevo Cliente</h1>
            <hr>
        </div>
        <form action="{{url('/clientes')}}" method="post">
            <br>
            @csrf
            @include('clientes.form')
            @yield('form')

            <br>
            <div class="row justify-content-between">
                <div class="col-s3"><a href="{{url('/clientes')}}" class="btn btn-block bg-danger">Cancelar</a></div>
                <div class="col-s3"><input type="submit" class="btn btn-block btn-success" value="Guardar"></div>
            </div>
        </form>
    </div>
    @yield('footer')
    <script>
    function upper(aux) {
        aux.value = aux.value.toUpperCase();
    }
    </script>