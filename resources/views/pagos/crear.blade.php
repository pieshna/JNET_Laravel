@include('template')
@yield('header')

<body>
    @yield('nav')

    <div class="container">
        <br>
        <br>
        <div class="container shadow-lg p-3 mb-5 bg-white rounded">
            <form action="{{url('/pagos')}}" method="post">
            <h2 class='text-center'>PAGOS</h2>
            <hr>
                <br>
                @csrf
                @include('pagos.form')
                @yield('form')

                <br>
                <br>
                <div class="row justify-content-between">
                    <div class="col-s3"><a href="{{url('/home')}}" class="btn btn-block bg-danger">Cancelar</a></div>
                    <div class="col-s3"><input type="submit" class="btn btn-block btn-success" id="ok" value="Guardar">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @yield('footer')
    <script>
    $("#cliente").change(function() {
        // Así accedemos al Valor de la opción seleccionada
        //alert('se ejecuta');
        listar();
        //alert(mes);

    });
    </script>
    <script>
    var listar = function() {
        cliente = $("#cliente").val();
        cadena = "fill/" + cliente;
        //alert(cadena);
        $.ajax({
            type: 'get',
            url: cadena,
            success: function(data) {
                $('#cargar').empty().html(data);

            }
        });
    }

    $("#ok").click(function() {
  //      v1 = window.open("{{url('pdf')}}", '_blank');
//	v2 = window.open("{{url('redireccionar')}}", '_blank');

    });
    </script>
