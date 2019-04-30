<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    public $table = "Asignacion";
	protected $fillable = [
		'voluntario_id', 'tarea_codigo', 'hora_inicio', 'hora_fin'
	];
}
