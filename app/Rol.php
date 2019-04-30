<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    public $table = "Rol";
	protected $fillable = [
		'nombre', 'descripcion'];
}
