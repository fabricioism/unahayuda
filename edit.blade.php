@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Creando Tarea</h3>
<form method="post" action="/encargados/tarea">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre:</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la tarea">
  </div>
  <div class="form-group">
    <div class="form-group">
      <label for="exampleFormControlSelect1">Lista: </label>
      <select class="form-control" id="lista_id" name="lista_id">
        @foreach($datos[0] as $lista)
          <option value="{{ $lista->id}}">{{ $lista->nombre}}</option>
        @endforeach
      </select>
    </div>
  </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1" >Tipo: </label>
      <select class="form-control" id="tipo_id" name="tipo_id">
        @foreach($datos[1] as $tipo)
          <option value="{{ $tipo->id}}">{{ $tipo->nombre}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Status: </label>
      <select class="form-control" id="status_id" name="status_id">
        @foreach($datos[2] as $status)
          <option value="{{ $status->id}}">{{ $status->nombre}}</option>
        @endforeach
      </select>
    </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción"></textarea>
  </div>
  <button type="submit" name="btn-guardar" id="btn-guardar" value="guardar" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-secondary" name="btn-limpiar" id="btn-limpiar">Limpiar</button>
</form>
<br>
@endsection