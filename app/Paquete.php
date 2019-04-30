<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    public $table = "Paquete";
	protected $fillable = [
		'fecha_creacion', 'peso', 'tarea_codigo'
	];
}
