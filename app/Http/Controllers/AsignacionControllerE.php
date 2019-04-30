<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Asignacion;
use App\Voluntario;
use App\Tarea;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateAsignacionRequest;
class AsignacionControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $asignaciones = DB::table('Asignacion')
                ->join('Voluntario', 'Voluntario.id', '=', 'Asignacion.voluntario_id')
                ->join('Tarea', 'Tarea.codigo', '=', 'Asignacion.tarea_codigo')
                ->select('Asignacion.*', 'Tarea.nombre')
                ->get();
        return view ('encargados.asignacion.index', compact("asignaciones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $voluntarios = Voluntario::all();
        $tareas      = Tarea::all();
        $datos = [$voluntarios, $tareas];
        return view ("encargados.asignacion.create", compact("datos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAsignacionRequest $request)
    {
        $date = Carbon::now();
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_ASIGNACION :voluntario_id, :tarea_codigo, :hora_inicio, :hora_fin, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':voluntario_id' => $request->voluntario_id,
                ':tarea_codigo' => $request->tarea_codigo,
                ':hora_inicio' => $date,
                ':hora_fin' => $date]);
          flash('Articulo Añadido')->important();
          return redirect("/encargados/asignacion");
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
        //
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
        //
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
