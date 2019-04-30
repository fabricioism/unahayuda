<?php

namespace App\Http\Controllers;
use App\Encargado;
use App\Rol;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateEncargadoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EncargadoControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $encargados = DB::table('Encargado')
                    ->join('Rol', 'Encargado.idRol', '=', 'Rol.id')
                    ->select('Encargado.*', 'Rol.nombre')
                    ->get();
        return view ('encargados.encargado.index', compact("encargados"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Rol::all();
        return view ("encargados.encargado.create", compact("roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEncargadoRequest $request)
    {
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_ENCARGADO :nombre1, :nombre2, :apellido1, :apellido2, :correo, :direccion, :telefono, :contrasena, :idRol, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':nombre1' => $request->nombre1,
                ':nombre2' => $request->nombre2,
                ':apellido1' => $request->apellido1,
                ':apellido2'  =>  $request->apellido2,
                ':correo' => $request->correo,
                ':direccion' => $request->direccion,
                ':telefono' => $request->telefono,
                ':contrasena' => Hash::make($request->contrasena),
                ':idRol' => $request->idRol]);
          flash('Articulo Añadido')->important();
          return redirect("/encargados/encargado");
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
