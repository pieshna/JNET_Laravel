@include('template')
@yield('header')
@yield('nav')
<div class="container jumbotron bg-info">
    <h3 class="display-5">Actualizar Cliente</h3>
  </div>
    <div class="container">
        <form action="{{url('/clientes/'.$buscarcliente->id)}}" method="post">
        <br>
            @csrf
            @method('PATCH')
            @include('clientes.form')
            @yield('form')

            <br>

            <div class="row justify-content-between">
                <div class="col-s3"><a href="{{url('/clientes')}}" class="btn btn-block bg-danger">Cancelar</a></div>
                <div class="col-s3"><input type="submit" class="btn btn-block btn-success" value="Editar"></div>
            </div>
        </form>

    </div>
    @yield('footer')
    <script>
    function upper(aux) {
        aux.value = aux.value.toUpperCase();
    }
    </script>