@include('template')
@yield('header')

<body>
    @yield('nav')
    <div class="container-fluid table-responsive">
        <h1 class='text-center'>CLIENTES: </h1>
        <hr>
        @if(Session::has('Mensaje'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{Session::get('Mensaje')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr class='bg-info'>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha de Facturacion</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Direccion IP</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td>{{$cliente->fecha_fac}}</td>
                    <td>{{$cliente->megas}} Megas</td>
                    <td>{{$cliente->direccion_ip}}</td>
                    <td>
                        <div class="row">
                            <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning">Editar</a>

                            <form method="post" action="{{url('/clientes/'.$cliente->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Borrar cliente?');"
                                    class="btn btn-danger">Borrar</button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-danger btn-lg col-xs-2" href="{{url('/home')}}">Inicio</a>
        <a class="btn btn-primary btn-lg col-xs-2 offset-8 float-right" href="{{url('/clientes/create')}}">Nuevo</a>
        <br><br>
    </div>
    @yield('footer')