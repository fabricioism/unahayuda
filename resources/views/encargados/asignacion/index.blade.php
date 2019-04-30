@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Asignaciones</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{route('asignacion.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Añadir Nueva Asignacion</a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-bordered table-hover" style="text-align:center;">
        <thead class="thead-dark">
          <tr class="warning">
            <th><i class="fas fa-pills"></i> Voluntario</th>
            <th>Tarea</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach($asignaciones as $asignacion)
        <tbody>
          <tr>
            <td> {{ $asignacion->voluntario_id}} </td>
            <td>{{ $asignacion->tarea_codigo}}</td>
            <td>{{$asignacion->hora_inicio}}</td>
            <td>{{$asignacion->hora_fin}}</td>
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