<?php

namespace App\Http\Controllers;
use App\Voluntario;
use Illuminate\Http\Request;
use App\Rol;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateVoluntarioRequest;
use Illuminate\Support\Facades\Hash;
class VoluntarioControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $voluntarios = DB::table('Voluntario')
                    ->join('Rol', 'Voluntario.idRol', '=', 'Rol.id')
                    ->select('Voluntario.*', 'Rol.nombre')
                    ->get();
        return view ('encargados.voluntario.index', compact("voluntarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Rol::all();
        return view ("encargados.voluntario.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$inicio = Carbon::now();
        $fin = Carbon::now();*/
        $inicio = explode("-",$request->inicio_periodo);
        $fin    = explode("-", $request->fin_periodo);
        $begin  = Carbon::createFromDate($inicio[0], $inicio[1], $inicio[2]);
        $end    = Carbon::createFromDate($fin[0], $fin[1], $fin[2]);

        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_VOLUNTARIO :nombre1, :nombre2, :apellido1, :apellido2, :correo, :direccion, :telefono, :contrasena, :idRol, :inicio_periodo, :fin_periodo,   @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':nombre1' => $request->nombre1,
                ':nombre2' => $request->nombre2,
                ':apellido1' => $request->apellido1,
                ':apellido2'  =>  $request->apellido2,
                ':correo' => $request->correo,
                ':direccion' => $request->direccion,
                ':inicio_periodo' =>$begin,
                ':fin_periodo' =>$end,
                ':telefono' => $request->telefono,
                ':contrasena' => Hash::make($request->contrasena),
                ':idRol' => $request->idRol]);
          flash('Articulo Añadido')->important();
          return redirect("/encargados/voluntario");
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
