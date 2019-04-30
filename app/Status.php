<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $table = "Status";
	protected $fillable = [
		'nombre', 'descripcion', 'valor'];
}
