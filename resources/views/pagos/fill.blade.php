@foreach($datosALlenar as $llenar)
<div class="form-group col-md-6">
    <label>Facturacion</label>
    <input type="text" class="form-control" name="fecha_fac" value='{{$llenar->fecha_fac}}' disabled>
</div>

<div class="form-group col-md-3">
    <label>Plan:</label>
    <input type="text" class="form-control" name="plan" value='{{$llenar->megas}}' disabled>
</div>
<div class="form-group col-md-3">
    <label>Total:</label>
    <input type="text" class="form-control" name="total" id="total" value='{{$llenar->precio}}' disabled>
</div>
@endforeach