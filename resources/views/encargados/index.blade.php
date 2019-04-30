@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Voluntarios</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('voluntario.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Añadir Nuevo Voluntario</a>
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
            <th>Inicio Periodo</th>
            <th>Fin Periodo</th>
            <th>Rol</th>
          </tr>
        </thead>
        @foreach($voluntarios as $voluntario)
        <tbody>
          <tr>
            <td> {{ $voluntario->nombre1 }} </td>
            <td> {{ $voluntario->nombre2 }} </td>
            <td> {{ $voluntario->apellido1 }} </td>
            <td> {{ $voluntario->apellido2 }} </td>
            <td> {{ $voluntario->correo }} </td>
            <td> {{ $voluntario->direccion }} </td>
            <td> {{ $voluntario->telefono }} </td>
            <td> {{ $voluntario->inicio_periodo }} </td>
            <td> {{ $voluntario->fin_periodo }} </td>
            <td>{{$voluntario->nombre}}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </main>
@endsection