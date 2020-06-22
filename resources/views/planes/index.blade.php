@include('template')
@yield('header')

<body>
    @yield('nav')
    <div class="container-fluid table-responsive">
        <h1 class='text-center'>PLANES: </h1>
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
                    <th scope="col">Megas</th>
                    <th scope="col">Precio</th>
                    <th scope="col" class="max-accion-plan">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($planes as $mega)
                <tr>
                    <td>{{$mega->id}}</td>
                    <td>{{$mega->megas}} Megas</td>
                    <td>Q.{{$mega->precio}}</td>
                    <td class="max-accion-plan">
                        <div class="row">
                            <a href="{{url('/planes/'.$mega->id.'/edit')}}" class="btn btn-warning">Editar</a>

                            <form method="post" action="{{url('/planes/'.$mega->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Borrar Plan?');"
                                    class="btn btn-danger separar-boton">Borrar</button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-danger btn-lg col-xs-2" href="{{url('/home')}}">Inicio</a>
        <a class="btn btn-primary btn-lg col-xs-2 offset-8 float-right" href="{{url('/planes/create')}}">Nuevo</a>
        <br><br>
    </div>
    @yield('footer')