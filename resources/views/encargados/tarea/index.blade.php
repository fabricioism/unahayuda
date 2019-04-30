@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tareas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('tarea.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Añadir Nueva Tarea</a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-bordered table-hover" style="text-align:center;">
        <thead class="thead-dark">
          <tr class="warning">
            <th><i class="fas fa-pills"></i> Nombre de la tarea</th>
            <th>Descripcion</th>
            <th>Lista</th>
            <th>Tipo</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach($tareas as $tarea)
        <tbody>
          <tr>
            <td> {{ $tarea->nombre }} </td>
            <td>{{ $tarea->descripcion}}</td>
            <td>{{$tarea->lnombre}}</td>
            <td>{{$tarea->tnombre}}</td>
            <td>{{$tarea->snombre}}</td>
            <th>
              <a href="{{route('tarea.edit', $tarea->codigo)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Editar</a>
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