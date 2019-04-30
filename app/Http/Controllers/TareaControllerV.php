<?php

namespace App\Http\Controllers;
use App\Tarea;
use Illuminate\Http\Request;

class TareaControllerV extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rol = $request->user()->idRol;
        if ($rol != 1){
            abort(403, 'Usuario no autorizado.');
        }
        return view ("encargados.tarea.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = $request->user()->idVoluntario($request);
        $tareas = DB::table('Tarea')
                    ->join('Asignacion', 'Tarea.codigo', '=', 'Asignacion.tarea_codigo')
                    ->join('Lista', 'Tarea.lista_id', '=', 'Lista.id')
                    ->join('Status', 'Tarea.status_id', '=', 'Status.id')
                    ->join('Tipo', 'Tarea.tipo_id', '=', 'Tipo.id')
                    ->select('Tarea.codigo', 'Tarea.nombre', 'Tarea.descripcion', 'Lista.nombre as lnombre', 'Tipo.nombre as tnombre', 'Status.nombre as snombre')
                    ->where('Asignacion.voluntario_id',$id)
                    ->get();
        return view ('voluntarios.tarea.show', compact("tareas"));
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
