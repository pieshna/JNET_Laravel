@include('template')

@yield('header')
    @yield('nav')
    <div class="container jumbotron">
        <h3 class="display-4 text-center">JNET</h3>
      </div>
      <div class="container text-center">
          <div class="row mx-auto">
              <div class="col-md-4">
                  <div class="card text-white bg-primary mb-3 largo-max">
                    <a class="btn text-white text-center" href="{{url('/clientes')}}"> 
                        <div class="card-body"><h4 class="card-title">Clientes</h4></div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card text-white bg-info mb-3 largo-max">
                    <a class="btn text-white text-center" href="{{url('/planes')}}">
                        <div class="card-body"><h4 class="card-title">Planes</h4></div>
                    </a>
                </div>
          </div>
          <div class="col-md-4">
                <div class="card text-white bg-success mb-3 largo-max">
                <a class="btn text-white text-center" href="{{url('/pagos/create')}}">
                    <div class="card-body"><h4 class="card-title">Pagos</h4></div>
                </a>
            </div>
            </div>
        </div>
        <div class="row mx-auto col-max">
            <div class="col-md-6">
                <div class="card text-white bg-light mb-3 largo-max">
                    <a class="btn text-white text-center" href="{{ url('/verpagos') }}">
                        <div class="card-body">
                        <h4 class="card-title">Meses</h4></div>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-warning mb-3 largo-max">
                    <a class="btn text-white text-center" href="indexservice.html">
                        <div class="card-body">
                        <h4 class="card-title">Pedidos</h4></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @yield('footer')
