<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ public_path('css/style.css') }}">
</head>

<body>
    <br>
    <div class="row contenedor">
        <div class="col-md-6">
            <img src="{{ public_path('imagenes/logo.png') }}" alt="Error" height="150px">
        </div>
        <div class="col-md-6">
            <p class='texto recibo text-right' id="">Recibo:{{  $fecha[1] }}</p>
        </div>
    </div>
    <br>
    @foreach($data as $datos)
    <div class="row contenedor">
        <div class="col-md-6">
            <p class='texto negrita'>CLIENTE: {{$datos->nombre}}</p>
        </div>
        <div class="col-md-6">
            
            <p class='texto fecha negrita' id="">Fecha:{{  $fecha[0] }}</p>
        </div>
    </div>
    <br>
    <div class="row contenedor">
        <table class="table centrar">
            <thead>
                <tr class="negrita"> 
                    <th>Cantidad</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>{{$datos->megas}}</p>
                    </td>
                    <td><p class="izquierda">Megas de internet por el mes de {{$datos->mes}}</p></td>
                    <td><p>Q.{{$datos->total}}</p></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="contenedor centrar">
        <p class="texto recibo centrar negrita">-CANCELADO-</p>
    </div>
    <br>
    <br>
    <div class="contenedor centrar color">
        <br>
        <h2>GRACIAS POR MANTENER SU PAGO AL DIA!</h2>
        <br>
    </div>
    @endforeach
    <!--<a class="btn btn-primary" href="{{route('download')}}">Guardar Recibo</a>-->
</body>

</html>
