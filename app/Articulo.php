<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public $table = "Articulo";
	protected $fillable = [
		'nombre', 'descripcion', 'valor', 'cant_bodega'
	];
}
