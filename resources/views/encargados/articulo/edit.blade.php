@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Editando Articulo</h3>
<form method="post" action="/encargados/articulo/{{$articulo->id}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleFormControlInput1">Llene los campos</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{$articulo->nombre}}">
  </div>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" name="valor" id="valor" value="{{$articulo->valor}}">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="cant_bodega" id="cant_bodega" value="{{$articulo->cant_bodega}}">
    </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" name="descripcion" id="descripcion" rows="3" >{{$articulo->descripcion}}</textarea>
  </div>
  <div class="form-group">
    <div class="spinner-border" role="status" id="spinner" name="spinner" style="display: none">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="alert alert-success" role="alert" id="alert" name="alert" style="display: none">
      ¡El articulo ha sido actualizado con exito!
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