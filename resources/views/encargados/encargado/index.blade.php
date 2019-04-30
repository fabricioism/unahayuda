@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Encargados</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('encargado.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Añadir Nuevo Encargado</a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-bordered table-hover" style="text-align:center;">
        <thead class="thead-dark">
          <tr class="warning">
            <th><i class="fas fa-pills"></i>Primer nombre</th>
            <th>Segundo nombre</th>
            <th>Primer apellido</th>
            <th>Segundo apellido</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Rol</th>
          </tr>
        </thead>
        @foreach($encargados as $encargado)
        <tbody>
          <tr>
            <td> {{ $encargado->nombre1 }} </td>
            <td> {{ $encargado->nombre2 }} </td>
            <td> {{ $encargado->apellido1 }} </td>
            <td> {{ $encargado->apellido2 }} </td>
            <td> {{ $encargado->correo }} </td>
            <td> {{ $encargado->direccion }} </td>
            <td> {{ $encargado->telefono }} </td>
            <td>{{$encargado->nombre}}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </main>
@endsection