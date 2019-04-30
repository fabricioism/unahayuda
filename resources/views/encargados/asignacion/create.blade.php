@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Creando Asignación</h3>
<form method="post" action="/encargados/asignacion">
@csrf
  <label for="exampleFormControlInput1">Llene los campos</label>
  <div class="row">
	<div class="col">
	  <label for="exampleFormControlSelect1">Voluntario</label>
	  <select class="form-control" id="voluntario_id" name="voluntario_id">
	  	@foreach($datos[0] as $voluntario)
	  		<option value="{{$voluntario->id}}">{{$voluntario->id}}</option>
	  	@endforeach
	  </select>
	</div>
	<div class="col">
	  <label for="exampleFormControlSelect1">Tarea</label>
	  <select class="form-control" id="tarea_codigo" name="tarea_codigo">
	  	@foreach($datos[1] as $tarea)
	  		<option value="{{$tarea->codigo}}">{{$tarea->nombre}}</option>
	  	@endforeach
	  </select>
	</div>
  </div>

    <div class="row">
		<div class="col">
			<div class="form-group">
			  <label for="example-datetime-local-input" class="col-2 col-form-label">Inicio</label>
				<input class="form-control" type="datetime-local" value="2019-04-18T13:45:00" id="example-datetime-local-input">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
			  <label for="example-datetime-local-input" class="col-2 col-form-label">Fin</label>
				<input class="form-control" type="datetime-local" value="2019-04-18T13:45:00" id="example-datetime-local-input">
			</div>
		</div>
  	</div>
  	<br>
  <div class="form-group">
    <div class="spinner-border" role="status" id="spinner" name="spinner" style="display: none">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="alert alert-success" role="alert" id="alert" name="alert" style="display: none">
      ¡El registro ha sido guardado con exito!
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