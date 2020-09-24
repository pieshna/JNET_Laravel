@section('form')
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Cliente</label>
        <select name="cliente" class="custom-select" id="cliente">
            <option value="" disabled selected>Seleccione cliente</option>
            @foreach($buscarcliente as $cliente)
            <option value="{{$cliente->id}}"> {{$cliente->nombre}} {{$cliente->apellido}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label>Mes</label>
        <select name="mes" class="custom-select" id="mes">
            <option value="" disabled selected>Seleccione un mes</option>
            <option value='ENERO'> ENERO</option>
            <option value='FEBRERO'> FEBRERO</option>
            <option value='MARZO'> MARZO</option>
            <option value='ABRIL'> ABRIL</option>
            <option value='MAYO'> MAYO</option>
            <option value='JUNIO'> JUNIO</option>
            <option value='JULIO'> JULIO</option>
            <option value='AGOSTO'> AGOSTO</option>
            <option value='SEPTIEMBRE'> SEPTIEMBRE</option>
            <option value='OCTUBRE'> OCTUBRE</option>
            <option value='NOVIEMBRE'> NOVIEMBRE</option>
            <option value='DICIEMBRE'> DICIEMBRE</option>
        </select>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <input type="checkbox" name="mora" id="mora" value="25">
        <label for="mora" id="txtmora">Mora</label>
    </div>
    <div class="form-group col-md-6">
        <input type="checkbox" name="instalacion" id="instalacion" value="50">
        <label for="instalacion" id="txtinstalacion">Instalacion</label>
    </div>
</div>
<br>
<div class="form-row" id='cargar'>
    <div class="form-group col-md-6">
        <label>Facturacion</label>
        <input type="text" class="form-control" name="fecha_fac" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Plan:</label>
        <input type="text" class="form-control" name="plan" disabled>
    </div>
    <div class="form-group col-md-3">
        <label>Total:</label>
        <input type="text" class="form-control" name="total" id="total" disabled>
    </div>
</div>

@stop
