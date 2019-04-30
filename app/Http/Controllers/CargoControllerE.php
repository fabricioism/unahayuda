<?php

namespace App\Http\Controllers;
use App\Cargo;
use App\Voluntario;
use App\Encargado;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateCargoRequest;

class CargoControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $cargos = DB::table('A_Cargo_De')
                    ->join('Voluntario', 'Voluntario.id', '=', 'A_Cargo_De.voluntario_id')
                    ->join('Encargado', 'Encargado.id', '=', 'A_Cargo_De.encargado_id')
                    ->select('A_Cargo_De.*', 'Voluntario.nombre1 as vnombre1', 'Voluntario.nombre2  as vnombre2', 'Voluntario.apellido1 as vapellido1', 'Voluntario.apellido2 as vapellido2', 'Encargado.nombre1 as enombre1',  'Encargado.nombre2 as enombre2',
                        'Encargado.apellido1 as eapellido1', 'Encargado.apellido2 as eapellido2')
                    ->get();
        return view ('encargados.a_cargo_de.index', compact("cargos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $voluntarios = Voluntario::all();
        $encargados  = Encargado::all();
        $datos = [$voluntarios, $encargados];
        return view ('encargados.a_cargo_de.create', compact("datos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCargoRequest $request)
    {
        $id = $request->user()->idEncargado($request);
        $idE = (int) $id[0]->id;
        $inicio = explode("-",$request->fecha_inicio);
        $fin    = explode("-", $request->fecha_fin);
        $begin  = Carbon::createFromDate($inicio[0], $inicio[1], $inicio[2]);
        $end    = Carbon::createFromDate($fin[0], $fin[1], $fin[2]);

        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_A_CARGO_DE :voluntario_id, :encargado_id, :fecha_inicio, :fecha_fin, :calificacion, :observacion, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':voluntario_id' => $request->voluntario_id,
                ':encargado_id' => $idE,
                ':fecha_inicio' => $begin,
                ':fecha_fin' => $end,
                ':calificacion' => $request->calificacion,
                ':observacion' => $request->observacion]);
          flash('Articulo Añadido')->important();
          return redirect("/encargados/a_cargo_de");
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
