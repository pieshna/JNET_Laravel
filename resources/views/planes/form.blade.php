@section('form')
<div class="form-row justify-content-md-center">
    <div class="form-group col-md-10 text-center">
        <br>
        <br>
        <br>
        <br>
        <br>
        <label>Megas:</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="megas"
            placeholder="Ingrese el numero de megas" value="{{isset($buscarplan->megas)?$buscarplan->megas:''}}"
            required>
    </div>
</div>
<div class="form-row justify-content-md-center">
    <div class="form-group col-md-10 text-center">
        <br>
        <br>
        <br>
        <br>
        <label>Precio:</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="precio"
            placeholder="Ingrese el precio sin simbolo de moneda"
            value="{{isset($buscarplan->precio)?$buscarplan->precio:''}}" required>
    </div>
</div>
@stop