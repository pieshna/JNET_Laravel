@include('template')
@yield('header')

<body>

    @yield('nav')
    <div class="container">
        <br>
        <div class="container shadow-lg p-3 mb-5 bg-white rounded">
            <form action="{{url('/planes/'.$buscarplan->id)}}" method="post">
                <div class="row center">
                    <div class=" col-sm-6">
                        <div class="row">

                            <img class="responsive-img" src="/imagenes/logo.png">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        @csrf
                        @method('PATCH')
                        @include('planes.form')
                        @yield('form')

                        <br>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a href="{{url('/planes')}}" class="btn btn-danger">Cancelar</a>
                    </div>
                    <div class="col-md-6 text-center">
                    <input type="submit" class="btn btn-success" value='Editar'>
                    </input>
                </div>
            </form>
        </div>
    </div>
    @yield('footer')