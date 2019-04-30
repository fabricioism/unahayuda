<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    //Verificando que el usuario tiene un rol
    public function autorizarEncargado($request){
        $rol = $request->user()->idRol;
        if ($rol != 1){
            abort(403, 'Usuario no autorizado.');
        }
    }

    public function idEncargado($request){
        $id = DB::table('Encargado')
        ->select('id')
        ->where('correo', '=', $request->user()->email)
        ->get();
        return $id;
    }

    public function idVoluntario($request){
        $id = DB::table('Voluntario')
        ->select('id')
        ->where('correo', '=', $request->user()->email)
        ->get();
        return $id;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
