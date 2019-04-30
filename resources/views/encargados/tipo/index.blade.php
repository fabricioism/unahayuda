@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tipos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('tipo.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Añadir Nuevo Tipo</a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-bordered table-hover" style="text-align:center;">
        <thead class="thead-dark">
          <tr class="warning">
            <th><i class="fas fa-pills"></i> Nombre del Tipo</th>
            <th>Descripcion</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach($tipos as $tipo)
        <tbody>
          <tr>
            <td> {{ $tipo->nombre }} </td>
            <td>{{ $tipo->descripcion}}</td>
            <th>
              <a href="{{route('tipo.edit', $tipo->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Editar</a>
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