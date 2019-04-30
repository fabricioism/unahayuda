@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Roles</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('rol.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Añadir Nuevo Rol</a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-bordered table-hover" style="text-align:center;">
        <thead class="thead-dark">
          <tr class="warning">
            <th><i class="fas fa-pills"></i> Nombre del Rol</th>
            <th>Descripcion</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach($roles as $rol)
        <tbody>
          <tr>
            <td> {{ $rol->nombre }} </td>
            <td>{{ $rol->descripcion}}</td>
            <th>
              <a href="#" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Editar</a>
            </th>
            <th>
              Eliminar
            </th>
          </tr>
        </tbody>
        @endforeach
      </table>
    </main>
@endsection