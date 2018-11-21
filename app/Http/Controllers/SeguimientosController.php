<?php

namespace App\Http\Controllers;

use Auth;
use App\Personas;
use App\Seguimientos;
use Illuminate\Http\Request;
use App\Http\Requests\FormSeguimientoRequest;

class SeguimientosController extends Controller{
	const DIR_TEMPLATE = 'seguimientos';
	public function lista(Request $request){
		$query = $request->input('query');
		$seguimientos = $query != null && $query != '' ? Seguimientos::where('tema', 'LIKE', "%$query%") : new Seguimientos();
		return view(self::DIR_TEMPLATE.'.lista', [
			'query' => $query,
			'buscar' => true,
			'url' => route('seguimientos.lista'),
			'placeholder' => 'Busca un seguimiento',
			'seguimientos' => $seguimientos->where('user_id', Auth::user()->id)->orderBy('fecha_finalizacion', 'ASC')->orderBy('id', 'DESC')->paginate(10)
		]);
	}
	public function nuevo(){
		return view(self::DIR_TEMPLATE.'.form', [
			'seguimiento' => new Seguimientos(),
			'personas' => ['' => 'Seleccione una persona'] + Personas::get()->mapWithKeys(function($persona){
				return [$persona['id'] => $persona['apellido'].' '.$persona['nombre']];
			})->toArray(),
			'route' => ['seguimientos.guardar_seguimiento'],
			'method' => 'post'
		]);
	}
	public function guardarSeguimiento(FormSeguimientoRequest $request){
		$seguimiento = null;
		if($request->seguimiento){
			$seguimiento = Seguimientos::updateData($request);
		}else{
			$seguimiento = Seguimientos::saveData($request);
		}
		return redirect()->route('seguimientos.seguimiento_tareas', ['seguimiento' => $seguimiento->id]);
	}
	public function cerrarSeguimiento(Seguimientos $seguimiento){
		$seguimiento->fecha_cerrado = date("Y-m-d h:i:s", time());
		$seguimiento->save();
		return redirect()->route('seguimientos.lista');
	}
}