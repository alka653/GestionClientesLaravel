<?php

namespace App;

use App\Constants;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model{
	protected $guarded = [];
	protected $fillable = ['nombre', 'descripcion', 'precio', 'estado'];
	public function getEstadoAttribute($estado){
		return Constants::ESTADOS[$estado]['text'];
	}
	public static function saveData($request){
		return Servicios::create([
			'nombre' => $request->input('nombre'),
			'descripcion' => $request->input('descripcion'),
			'precio' => $request->input('precio'),
			'estado' => 'A'
		]);
	}
	public static function updateData($request){
		$servicio = Servicios::find($request->servicio);
		$servicio->nombre = $request->input('nombre');
		$servicio->descripcion = $request->input('descripcion');
		$servicio->precio = $request->input('precio');
		$servicio->save();
		return $servicio;
	}
}