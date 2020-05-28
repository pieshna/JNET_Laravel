@section('form')
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Nombre</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="name"
            placeholder="Ingrese el nombre" value="{{isset($buscarusuario->name)?$buscarusuario->name:''}}" required>
    </div>
    <div class="form-group col-md-4">
        <label>Correo</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="email"
            placeholder="Ingrese el Correo" value="{{isset($buscarusuario->email)?$buscarusuario->email:''}}" required>
    </div>
</div>
@stop
@section('cambiarPass')
<div class="form-row">
    <div class="form-group col-md-4">
        <label>Contraseña anterior</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="oldpassword"
            placeholder="Ingrese la contraseña" value="" required>
    </div>
    <div class="form-group col-md-4">
        <label>Nueva contraseña</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="password"
            placeholder="Ingrese la contraseña" value="" required>
    </div>
    <div class="form-group col-md-4">
        <label>Repetir nueva contraseña</label>
        <input type="text" onkeyup="javascript:upper(this)" class="form-control" name="password1"
            placeholder="Ingrese la contraseña" value="" required>
    </div>
</div>



@stop