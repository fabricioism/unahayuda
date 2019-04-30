@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Actualizando Paquete</h3>
<form method="post" action="/encargados/paquete">
  @csrf
  <label for="exampleFormControlInput1">Llene los campos</label>
    <div class="row">
		<div class="col">
			<div class="form-group">
			    <label for="exampleFormControlInput1">Peso:</label>
			    <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso del Paquete">
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


  <button type="submit" name="btn-guardar" id="btn-guardar" value="guardar" class="btn btn-primary">Guardar</button>
  <button type="reset" class="btn btn-secondary" name="btn-limpiar" id="btn-limpiar">Limpiar</button>
</form>
<br>
@endsection