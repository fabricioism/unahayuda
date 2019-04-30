@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<h3>Creando Encargado</h3>
<form method="post" action="/encargados/encargado">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Primer nombre</label>
      <input type="text" class="form-control" id="nombre1" name="nombre1" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Segundo nombre</label>
      <input type="text" class="form-control" id="nombre2" name="nombre2">
    </div>
    <div class="form-group col-md-6">
      <label for="text">Primer apellido</label>
      <input type="text" class="form-control" id="apellido1" name="apellido1">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Segundo apellido</label>
      <input type="text" class="form-control" id="apellido2" name="apellido2">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Correo</label>
      <input type="email" class="form-control" id="correo" name="correo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Contraseña</label>
      <input type="password" class="form-control" id="contrasena" name="contrasena">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Dirección</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Telefono</label>
      <input type="text" class="form-control" id="telefono" name="telefono">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Rol</label>
      <select id="inputState" class="form-control" id="idRol", name="idRol">
        @foreach($roles as $rol)
          <option value="{{$rol->id}}">{{$rol->nombre}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="spinner-border" role="status" id="spinner" name="spinner" style="display: none">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="alert alert-success" role="alert" id="alert" name="alert" style="display: none">
      ¡El encargado ha sido insertado con exito!
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