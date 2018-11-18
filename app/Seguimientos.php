<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Constants;

class Seguimientos extends Model{
	protected $guarded = [];
	public $timestamps = false;
	public function getEstadoAttribute($estado){
		return Constants::ESTADOS[$estado]['text'];
	}
	public function porcentaje(){
		$total_finalizadas = $this->tareas->filter(function($tarea){
			return $tarea->finalizada;
		})->count();
		return intval(($total_finalizadas * 100) / $this->tareas->count()).'%';
	}
	public function persona(){
		return $this->belongsTo('App\Personas', 'persona_id');
	}
	public function tareas(){
		return $this->hasMany('App\SeguimientosTareas', 'seguimiento_id')->orderBy('finalizada', 'ASC')->orderBy('id', 'DESC');
	}
	public static function saveData($request){
		return Seguimientos::create([
			'tema' => $request->input('tema'),
			'user_id' => Auth::user()->id,
			'fecha_apertura' => date("Y-m-d h:i:s", time()),
			'fecha_finalizacion' => $request->input('fecha_finalizacion'),
			'persona_id' => $request->input('persona_id'),
			'estado' => 'P'
		]);
	}
	public static function updateData($request){
		$seguimiento = Seguimientos::find($request->seguimiento);
		$seguimiento->tema = $request->input('tema');
		$seguimiento->fecha_finalizacion = $request->input('fecha_finalizacion');
		$seguimiento->save();
		return $seguimiento;
	}
}