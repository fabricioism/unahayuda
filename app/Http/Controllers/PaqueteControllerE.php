<?php

namespace App\Http\Controllers;
use App\Paquete;
use App\Tarea;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePaqueteRequest;
class PaqueteControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $paquetes = DB::table('Paquete')
                ->join('Tarea', 'Tarea.codigo', '=', 'tarea_codigo')
                ->select('Paquete.*', 'Tarea.nombre')
                ->get();
        return view ('encargados.paquete.index', compact("paquetes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tareas = Tarea::all();
        return view ("encargados.paquete.create", compact("tareas"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePaqueteRequest $request)
    {
        $date = Carbon::now();

        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_PAQUETE :fecha_creacion, :peso, :tarea_codigo, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':fecha_creacion' => $date,
                ':peso' => $request->peso,
                ':tarea_codigo' => $request->tarea_codigo]);
          flash('Paquete Añadido')->important();
          return redirect("/encargados/paquete");
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
        $paquete = Paquete::findOrFail($id);
        $tareas = Tarea::all();
        return view("encargados.paquete.edit", compact("paquete", "tareas"));
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
        $fecha = Carbon::now();
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_UPDATE_PAQUETE :id, :fecha_creacion, :peso, :tarea_codigo, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':id' => $id,
                ':fecha_creacion' => $fecha,
                ':peso' => $request->peso,
                ':tarea_codigo' => $request->tarea_codigo]);
          flash('Paquete actualizado')->important();
          return redirect("/encargados/paquete");
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
