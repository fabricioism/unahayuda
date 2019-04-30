@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Creando contenidos de paquetes</h3>
<form method="post" action="/encargados/contenido">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState">Paquete</label>
      <select class="form-control" id="paquete_id" name="paquete_id">
        @foreach($datos[1] as $paquete)
          <option value="{{$paquete->id}}">{{$paquete->id}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Articulo</label>
      <select id="inputState" class="form-control" id="articulo_id" name="articulo_id">
        @foreach($datos[0] as $articulo)
          <option value="{{$articulo->id}}">{{$articulo->nombre}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label for="text">Cantidad</label>
      <input type="text" class="form-control" id="cantidad" name="cantidad">
    </div>
  </div>
  <br>
  <button type="submit" name="btn-guardar" id="btn-guardar" value="guardar" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-secondary" name="btn-limpiar" id="btn-limpiar">Limpiar</button>
</form>
<br>
@endsection