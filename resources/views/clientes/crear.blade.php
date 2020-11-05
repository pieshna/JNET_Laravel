@include('template')
@yield('header')
@yield('nav')
<br>
<div class="container jumbotron bg-info">
    <h3 class="display-5">Ingresar Nuevo Cliente</h3>
</div>
    <div class="container">
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