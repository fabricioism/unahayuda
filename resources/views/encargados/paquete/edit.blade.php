@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Creando Paquete</h3>
<form method="post" action="/encargados/paquete/{{$paquete->id}}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <label for="exampleFormControlInput1">Llene los campos</label>
    <div class="row">
		<div class="col">
			<div class="form-group">
			    <label for="exampleFormControlInput1">Peso:</label>
			    <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso del Paquete" value="{{$paquete->peso}}">
			</div>
		</div>
  	</div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Tarea: </label>
      <select class="form-control" id="tarea_codigo" name="tarea_codigo">
        @foreach($tareas as $tarea)
          <option value="{{$tarea->codigo}}">{{$tarea->nombre}}</option>
        @endforeach
      </select>
    </div>
  	<br>
  <div class="form-group">
    <div class="spinner-border" role="status" id="spinner" name="spinner" style="display: none">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="alert alert-success" role="alert" id="alert" name="alert" style="display: none">
      ¡El paquete ha sido actualizado con exito!
    </div>
    <div class="alert alert-danger" role="alert" id="error" name="error">
      @if(count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{$error}}<br>
        @endforeach
      @endif
    </div>
  </div>
  <button type="submit" name="btn-guardar" id="btn-guardar" value="guardar" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-secondary" name="btn-limpiar" id="btn-limpiar">Limpiar</button>
</form>
<br>
@endsection