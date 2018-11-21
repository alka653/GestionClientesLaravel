<?php

namespace App\Http\Controllers;

use Auth;
use App\Seguimientos;
use App\SeguimientosTareas;
use Illuminate\Http\Request;

class DashboardController extends Controller{
	const DIR_TEMPLATE = 'dashboard';
	public function listaSeguimiento(){
		return Seguimientos::where('user_id', Auth::user()->id);
	}
	public function index(){
		$total_seguimientos_proceso = 0;
		$total_seguimientos_pendientes = 0;
		$total_seguimientos_completados = 0;
		foreach($this->listaSeguimiento()->get() as $seguimiento){
			if($seguimiento->porcentaje() == 100){
				$total_seguimientos_completados += 1;
			}
			if($seguimiento->porcentaje() > 0 && $seguimiento->porcentaje() < 100){
				$total_seguimientos_proceso += 1;
			}
			if($seguimiento->porcentaje() == 0){
				$total_seguimientos_pendientes += 1;
			}
		}
		return view(self::DIR_TEMPLATE.'/index', [
			'total_seguimientos' => $this->listaSeguimiento()->count(),
			'total_seguimientos_completados' => $total_seguimientos_completados,
			'total_seguimientos_proceso' => $total_seguimientos_proceso,
			'total_seguimientos_pendientes' => $total_seguimientos_pendientes,
			'tareas' => SeguimientosTareas::whereIn('seguimiento_id', $this->listaSeguimiento()->get()->map(function($seguimiento){
				return $seguimiento->only(['id']);
			})->toArray())->orderBy('finalizada', 'ASC')->orderBy('id', 'ASC')->limit(5)->get(),
			'seguimientos' => $this->listaSeguimiento()->with('persona')->orderBy('fecha_cerrado', 'ASC')->orderBy('fecha_apertura', 'ASC')->orderBy('id', 'DESC')->limit(5)->get()
		]);
	}
}