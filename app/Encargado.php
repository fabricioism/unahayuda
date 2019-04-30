<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    public $table = "Encargado";
	protected $fillable = [
		'nombre1', 'nombre2', 'apellido1', 'apellido2', 'correo', 'direccion','telefono', 'contrasena', 'idRol'
	];
}
