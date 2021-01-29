@include('template')
@yield('header')
@yield('nav')
<div class="container-fluid ajustar jumbotron bg-info">
    <h3 class="display-5">Cartera de Clientes</h3>
    <p class="lead text-white">Informacion correspondiente de los clientes.</p>
    <hr class="my-4">
</div>
@if(Session::has('Mensaje'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{Session::get('Mensaje')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  @endif
  
  <div class="container-fluid table-responsive">
    <a class="btn btn-primary btn-lg col-xs-2" href="{{url('/clientes/create')}}"><span class="material-icons">
      add_circle_outline
      </span></a>   
    <br>
    <br>
        <table class="table table-hover" id='grid'>
            <thead>
                <tr class='bg-info'>
                    <th scope="col" data-type="number">ID</th>
                    <th scope="col" data-type="string">Nombre</th>
                    <th scope="col" data-type="string">Apellido</th>
                    <th scope="col" data-type="string">Direccion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col" data-type="number">Fecha de Facturacion</th>
                    <th scope="col" data-type="string">Plan</th>
                    <th scope="col" data-type="string">Direccion IP</th>
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
                    <td><a href="http://wa.me/502{{$cliente->telefono}}" target="_blank" class="txtnegro">{{$cliente->telefono}}</a></td>
                    <td>{{$cliente->fecha_fac}}</td>
                    <td>{{$cliente->megas}} Megas</td>
                    <td><a href="http://{{$cliente->direccion_ip}}:8080" target="_blank" class="txtnegro">{{$cliente->direccion_ip}}</a></td>
                    <td>
                      <div class="row">
                        @if(Auth::user()->roluser=='1')
                        <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-warning"><span class="material-icons">
                          create
                          </span></a>
                        
                        <form method="post" action="{{url('/clientes/'.$cliente->id)}}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Borrar cliente?');"
                          class="btn btn-danger separar-boton"><span class="material-icons">
                            delete
                            </span></button>
                        </form>
                        
                        @endif
                        <a class="btn btn-info separar-boton" target="_blank"
                        href="https://api.whatsapp.com/send?phone=502{{$cliente->telefono}}&text=Estimado usuario de Jnet por el siguiente medio le recordamos que se encuentra proximo a su fecha de pago ({{$cliente->fecha_fac}} del presente) con un saldo de: Q{{$cliente->precio}} correspondiente al consumo del mes&source=&data=">
                        <span class="material-icons">
                          email
                          </span>
                      </a>
                      <a class="btn btn-info separar-boton" target="_blank"
                      href="https://api.whatsapp.com/send?phone=502{{$cliente->telefono}}&text=Estimado usuario de Jnet por el siguiente medio le recordamos que su fecha de pago ya expiro y cuenta con un saldo pendiente de Q{{$cliente->precio}} correspondiente al consumo del último mes, le recordamos que desde ya puede pasar a cancelar su pago, de lo contrario se le estaria aplicando una mora de Q25... Si usted ya cancelo por favor OMITIR este mensaje.&source=&data=">
                      <span class="material-icons">
                        forward_to_inbox
                        </span>
                        </a>
                        <a class="btn btn-danger separar-boton" target="_blank"
                            href="https://api.whatsapp.com/send?phone=502{{$cliente->telefono}}&text=Estimado usuario de Jnet por el siguiente medio le recordamos que debido a la falta de pago el servicio ha sido suspendido, para poder seguir disfrutando de nuestro servicio le comentamos que desde ya puede pasar a cancelar&source=&data=">
                            <span class="material-icons">
                              content_cut
                              </span>
                        </a>
                        <a class="btn btn-info separar-boton" target="_blank"
                            href="https://api.whatsapp.com/send?phone=502{{$cliente->telefono}}&text=Estimado usuario de Jnet por el siguiente medio le notificamos que el dia de hoy se estara haciendo mantenimiento de ultima hora de 2:30 a 5:00 de la tarde, motivo por el cual el servicio podria presentar irregularidades en el transcurso del mantenimiento... Desde ya agradecemos su comprension, que tenga lindo dia!&source=&data=">
                            <span class="material-icons">
                              perm_data_setting
                              </span>
                        </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-danger btn-lg col-xs-2" href="{{url('/home')}}"><span class="material-icons">
          arrow_back
          </span></a>  
        <br><br>
    </div>
    <script>

    grid.onclick = function(e) {
      if (e.target.tagName != 'TH') return;

      let th = e.target;
      // if TH, then sort
      // cellIndex is the number of th:
      //   0 for the first column
      //   1 for the second column, etc
      sortGrid(th.cellIndex, th.dataset.type);
    };

    function sortGrid(colNum, type) {
      let tbody = grid.querySelector('tbody');

      let rowsArray = Array.from(tbody.rows);

      // compare(a, b) compares two rows, need for sorting
      let compare;

      switch (type) {
        case 'number':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML - rowB.cells[colNum].innerHTML;
          };
          break;
        case 'string':
          compare = function(rowA, rowB) {
            return rowA.cells[colNum].innerHTML > rowB.cells[colNum].innerHTML ? 1 : -1;
          };
          break;
      }

      // sort
      rowsArray.sort(compare);

      tbody.append(...rowsArray);
    }
  </script>
    @yield('footer')