@extends("../../layouts.plantillaEncargado")

@section("cabecera")

@endsection

@section("cuerpo")
<main role="main" class="col-md-10 ml-sm-auto col-lg-12 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articulos</h1>
      </div>
      <table class="table table-striped table-bordered table-hover" style="text-align:center;">
        <thead class="thead-dark">
          <tr class="warning">
            <th><i class="fas fa-pills"></i> Nombre del Articulo</th>
            <th>Descripcion</th>
            <th>Valor</th>
            <th>Cantidad</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        @foreach($articulos as $articulo)
        <tbody>
          <tr>
            <td> {{ $articulo->nombre }} </td>
            <td>{{ $articulo->descripcion}}</td>
            <td>{{$articulo->valor}}</td>
            <td>{{$articulo->cant_bodega}}</td>
            <th>
              <a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Editar</a>
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