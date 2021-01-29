@section('form')
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="nombre" placeholder="Ingrese el nombre"
            value="{{isset($buscarcliente->nombre)?$buscarcliente->nombre:''}}" required>
    </div>
    <div class="form-group col-md-6">
        <label>Apellido</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="apellido" placeholder="Ingrese el apellido"
            value="{{isset($buscarcliente->apellido)?$buscarcliente->apellido:''}}" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Direccion</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="direccion" placeholder="Ingrese la direccion"
            value="{{isset($buscarcliente->direccion)?$buscarcliente->direccion:''}}" required>
    </div>

    <div class="form-group col-md-3">
        <label>Telefono</label>
        <input type="text" class="form-control" name="telefono" placeholder="Ingrese el telefono"
            value="{{isset($buscarcliente->telefono)?$buscarcliente->telefono:''}}" required>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha de Facturacion cada:</label>
        <input type="number" class="form-control" name="fecha_fac" id="fecha_fac" placeholder="Ingrese la fecha de facturacion"
            value="{{isset($buscarcliente->fecha_fac)?$buscarcliente->fecha_fac:''}}" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label>Plan</label>
        <select name="plan" class="custom-select" id="plan">
            @foreach($buscarplan as $mega)
            @if(isset($buscarcliente))
            @if($mega->id===$buscarcliente->plan)
            <option value="{{$mega->id}}" selected> {{$mega->megas}} Megas</option>
            @else
            <option value="{{$mega->id}}"> {{$mega->megas}} Megas</option>
            @endif
            @else
            <option value="{{$mega->id}}"> {{$mega->megas}} Megas</option>

            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
        <label>Direccion IP</label>
        <input type="text" class="form-control" name="direccion_ip" placeholder="xxx.xxx.xxx.xxx"
            value="{{isset($buscarcliente->direccion_ip)?$buscarcliente->direccion_ip:''}}" required>
    </div>
    <div class="form-group col-md-4">
        <label>Creado Por</label>
        <input type="text" class="form-control" name="usuario" placeholder="Ingrese el usuario"
            value="{{isset($buscarcliente->usuario)?$buscarcliente->usuario: Auth::user()->name }}" required>
    </div>
    <div class="form-group col-md-3">
        <label>Fecha de creacion</label>
        <input type="date" class="form-control" name="fecha_creacion" placeholder="Ingrese la fecha"
            value="{{isset($buscarcliente->fecha_creacion)?$buscarcliente->fecha_creacion: ''}}" required>
    </div>
</div>
@stop
