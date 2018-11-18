<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguimientosTareas extends Model{
	protected $guarded = [];
	public $timestamps = false;
	public static function saveData($request){
		return SeguimientosTareas::create([
			'seguimiento_id' => $request->input('seguimiento_id'),
			'descripcion' => $request->input('tarea_descripcion'),
			'finalizada' => false
		]);
	}
}