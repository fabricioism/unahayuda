<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public $table = "A_Cargo_De";
	protected $fillable = [
		'encargado_id', 'voluntario_id', 'fecha_inicio', 'fecha_fin', 'calificacion', 'observacion'
	];
}
