@include('template')
@yield('header')

<body>
    @yield('nav')
    <div class="container-fluid table-responsive">
        <h1 class='text-center'>USUARIOS: </h1>
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
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    @if(Auth::user()->roluser=='1')
                    <th scope="col">Contraseña</th>
                    <th scope="col">Acciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td><img src="{{asset('storage').'/'.$usuario->picture}}" alt="No hay" class="fotoIndex"></td>
                    <td>{{$usuario->name}}</td>
                    <td>{{$usuario->email}}</td>
                    @if(Auth::user()->roluser=='1')
                    <td>{{$usuario->password}}</td>
                    <td>
                        <div class="row">
                            <a href="{{url('/usuarios/'.$usuario->id.'/edit')}}" class="btn btn-warning">Editar</a>
                            
                            <form method="post" action="{{url('/usuarios/'.$usuario->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Borrar usuario?');"
                                class="btn btn-danger separar-boton">Borrar</button>
                            </form>
                            
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-danger btn-lg col-xs-2" href="{{url('/home')}}">Inicio</a>
        @if(Auth::user()->roluser=='1')
        <a class="btn btn-primary btn-lg col-xs-2 offset-8 float-right" href="{{url('/usuarios/create')}}">Nuevo</a>
        @endif
        <br><br>
    </div>
    @yield('footer')