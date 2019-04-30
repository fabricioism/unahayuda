<?php

namespace App\Http\Controllers;
use App\Lista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateListaRequest;
class ListaControllerE extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->autorizarEncargado($request);
        $listas = Lista::all();
        return view ('encargados.lista.index', compact("listas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view ('encargados.lista.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateListaRequest $request)
    {
        $results = DB::select('
            DECLARE @pbOcurrioError INT, @pcMensaje varchar(1000)
            EXEC dbo.SP_INSERT_LISTA :nombre, :descripcion, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':nombre' => $request->nombre,
                ':descripcion' => $request->descripcion]);
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
        $lista = Lista::findOrFail($id);
        return view("encargados.lista.edit", compact("lista"));
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
            EXEC dbo.SP_UPDATE_LISTA :id, :nombre, :descripcion, @pcMensaje = @pcMensaje OUTPUT, @pbOcurrioError = @pbOcurrioError OUTPUT
            SELECT  @pcMensaje AS mensaje, @pbOcurrioError as error',
                [':id'=> $id,
                ':nombre' => $request->nombre,
                ':descripcion' => $request->descripcion]);
        return redirect("/encargados/lista");
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
