<?php

namespace App\Http\Controllers;
use App\Tarea;
use App\Tipo;
use App\Lista;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateTareaRequest;
class TareaControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $tareas = DB::table('Tarea')
                    ->join('Lista', 'Tarea.lista_id', '=', 'Lista.id')
                    ->join('Status', 'Tarea.status_id', '=', 'Status.id')
                    ->join('Tipo', 'Tarea.tipo_id', '=', 'Tipo.id')
                    ->select('Tarea.codigo', 'Tarea.nombre', 'Tarea.descripcion', 'Lista.nombre as lnombre', 'Tipo.nombre as tnombre', 'Status.nombre as snombre')
                    ->get();
        return view ('encargados.tarea.index', compact("tareas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $listas = Lista::all();
        $tipos  = Tipo::all();
        $status = Status::all();
        $datos = [$listas, $tipos, $status];
        return view ("encargados.tarea.create", compact("datos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTareaRequest $request)
    {
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_TAREA :nombre, :descripcion, :lista_id, :tipo_id, :status_id, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':nombre' => $request->nombre,
                ':descripcion' => $request->descripcion,
                ':lista_id' => $request->lista_id,
                ':tipo_id' => $request->tipo_id,
                ':status_id' => $request->status_id]);
          flash('Articulo Añadido')->important();
          return redirect("/encargados/tarea");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::where('codigo', $id)->get();
        $listas = Lista::all();
        $tipos  = Tipo::all();
        $status = Status::all();
        $datos = [$listas, $tipos, $status];
        return view("encargados.tarea.edit", compact(["tarea", "datos"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_UPDATE_TAREA :codigo, :nombre, :descripcion, :lista_id, :tipo_id, :status_id, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':codigo' => $id,
                ':nombre' => $request->nombre,
                ':descripcion' => $request->descripcion,
                ':lista_id' => $request->lista_id,
                ':tipo_id' => $request->tipo_id,
                ':status_id' => $request->status_id]);
          flash('Articulo Añadido')->important();
          return redirect("/encargados/tarea");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
