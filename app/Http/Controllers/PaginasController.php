<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function index(Request $request){
        $rol = $request->user()->idRol;
        if ($rol == 1){
        	return view ("encargados.inicioEncargado");
        }else{
        	return view ("voluntarios.inicioVoluntario");
        }
    }

    public function show(){
    	//
    }

}
