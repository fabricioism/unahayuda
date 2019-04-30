<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public $table = "Tarea";
	protected $fillable = [
		'nombre', 'descripcion', 'lista_id', 'tipo_id', 'status_id'
	];

}
