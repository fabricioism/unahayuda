<?php

namespace App\Http\Controllers;
use App\Contenido;
use App\Articulo;
use App\Paquete;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateContenidoRequest;
use Illuminate\Http\Request;

class ContenidoControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $contenidos = DB::table('Contenido')
                        ->join('Articulo', 'Contenido.articulo_id', '=', 'Articulo.id')
                        ->select('Contenido.*', 'Contenido.id as idContenido' ,'Articulo.id', 'Articulo.nombre', 'Contenido.paquete_id', 'Contenido.cantidad')
                        ->get();
        return view ('encargados.contenido.index', compact("contenidos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $articulos = Articulo::all();
        $paquetes  = Paquete::all();
        $datos = [$articulos, $paquetes];
        $rol = $request->user()->idRol;
        if ($rol != 1){
            abort(403, 'Usuario no autorizado.');
        }
        return view ('encargados.contenido.create', compact("datos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContenidoRequest $request)
    {
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_CONTENIDO :paquete_id, :articulo_id, :cantidad, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':paquete_id' => $request->paquete_id,
                ':articulo_id' => $request->articulo_id,
                ':cantidad' => $request->cantidad]);
          flash('COntenido Añadido')->important();
          return redirect("/encargados/contenido");
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
        $articulos = Articulo::all();
        $paquetes  = Paquete::all();
        $datos = [$articulos, $paquetes];
        $contenido = Contenido::findOrFail($id);
        return view("encargados.contenido.edit", compact("contenido", "datos"));
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
            EXEC dbo.SP_UPDATE_CONTENIDO :id, :paquete_id, :articulo_id, :cantidad, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':id' => $request->id,
                ':paquete_id' => $request->paquete_id,
                ':articulo_id' => $request->articulo_id,
                ':cantidad' => $request->cantidad]);
          flash('COntenido Añadido')->important();
          return redirect("/encargados/contenido");
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
