<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    public $table = "Contenido";
	protected $fillable = [
		'paquete_id', 'articulo_id', 'cantidad'
	];
}
