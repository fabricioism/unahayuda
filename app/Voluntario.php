<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voluntario extends Model
{
    public $table = "Voluntario";
	protected $fillable = [
		'nombre1', 'nombre2', 'apellido1', 'apellido2', 'correo', 'direccion','telefono', 'contrasena', 'inicio_periodo', 'fin_periodo','idRol'
	];
}
