@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Asignando voluntarios a su cargo</h3>
<form method="post" action="/encargados/a_cargo_de">
  @csrf
  <div class="form-group">
    <label for="exampleFormControlInput1">Llene los campos</label><br>
      <label for="exampleFormControlSelect1">Voluntario</label>
      <select class="form-control" id="voluntario_id" name="voluntario_id">
        @foreach($datos[0] as $voluntario)
          <option value="{{$voluntario->id}}">{{$voluntario->id}}</option>
        @endforeach
      </select>
  </div>
    <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="example-datetime-local-input" class="col-2 col-form-label">Inicio</label>
        <input class="form-control" type="date" value="2019-04-18T13:45:00" id="fecha_inicio" name="fecha_inicio">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="example-datetime-local-input" class="col-2 col-form-label">Fin</label>
        <input class="form-control" type="date" value="2019-04-18T13:45:00" id="fecha_fin" name="fecha_fin">
      </div>
    </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="exampleFormControlSelect1">Calificacion</label>
        <select class="form-control" id="calificacion" name="calificacion">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
      </div>
    </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1"></label>
    <textarea class="form-control" id="observacion" name="observacion" rows="3" placeholder="Observación"></textarea>
  </div>
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