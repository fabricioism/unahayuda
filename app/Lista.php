<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public $table = "Lista";
	protected $fillable = [
		'nombre', 'descripcion'];
}
