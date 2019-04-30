@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Creando lista</h3>
<form method="post" action="/encargados/lista">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="text">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="text">Descripción</label>
      <input type="text" class="form-control" id="descripcion" name="descripcion">
    </div>
  </div>
  <div class="alert alert-danger" role="alert" id="error" name="error">
    @if(count($errors) > 0)
      @foreach ($errors->all() as $error)
        {{$error}}<br>
      @endforeach
    @endif
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-secondary">Limpiar</button>
</form>
<br>
@endsection