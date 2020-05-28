@include('template')

@yield('header')

<body onLoad="setInterval('FyH()', 1000);" class='bg-info text-white'>
    @yield('nav')
    <div class="container">
        <br>
        <div class="text-center">
            <img src="/imagenes/logo.png" alt="Logo" height="150px">
        </div>
        <br>
        <h5 id="fecha" class='text-center'></h5>
        <h5 id="hora" class='text-center'></h5>
        <br><br>
        <div class="row">
            <div class="col-md-6 text-center">
                <a href="{{url('clientes/menu')}}"> <img src="/imagenes/client.png" alt=""> </a>
            </div>
            <div class="col-md-6 text-center">
                <a href="{{url('/pagos/create')}}"> <img src="/imagenes/pago.png" alt=""> </a>
            </div>
        </div>
    </div>
    @yield('footer')
    <script>
    function FyH() {
        var d = new Date();
        var hora = d.getHours(),
            minuto = d.getMinutes(),
            segundos = d.getSeconds(),
            dia = d.getDate(),
            mes = (d.getMonth() + 1),
            anio = d.getFullYear();
        if (hora < 10) {
            hora = "0" + hora;
        }
        if (minuto < 10) {
            minuto = "0" + minuto
        }
        if (segundos < 10) {
            segundos = "0" + segundos;
        }
        if (dia < 10) {
            dia = "0" + dia;
        }
        if (mes < 10) {
            mes = "0" + mes;
        }
        document.getElementById("fecha").innerHTML = dia + "/" + mes + "/" + anio;
        document.getElementById("hora").innerHTML = hora + ":" + minuto + ":" + segundos;
    }
    </script>