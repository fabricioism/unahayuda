@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Actualizando roles</h3>
<form method="post" action="/encargados/rol/{{$rol->id}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="text">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" value="{{$rol->nombre}}">
    </div>
    <div class="form-group col-md-6">
      <label for="text">Descripción</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$rol->descripcion}}">
    </div>
  </div>
  <br>
  <div class="form-group">
    <div class="spinner-border" role="status" id="spinner" name="spinner" style="display: none">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="alert alert-success" role="alert" id="alert" name="alert" style="display: none">
      ¡El articulo ha sido insertado con exito!
    </div>
    <div class="alert alert-danger" role="alert" id="error" name="error">
      @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{$error}}<br>
        @endforeach
      @endif
    </div>
  </div>
  <button type="submit" name="btn-guardar" id="btn-guardar" value="guardar" class="btn btn-primary">Actualizar</button>
  <button type="reset" class="btn btn-secondary" name="btn-limpiar" id="btn-limpiar">Limpiar</button>
</form>
<br>
@endsection