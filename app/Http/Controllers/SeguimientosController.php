<?php

namespace App\Http\Controllers;

use App\Personas;
use App\Seguimientos;
use App\SeguimientosTareas;
use Illuminate\Http\Request;
use App\Http\Requests\FormSeguimientoRequest;
use App\Http\Requests\FormSeguimientoTareaRequest;

class SeguimientosController extends Controller{
	const DIR_TEMPLATE = 'seguimientos';
	public function lista(Request $request){
		$query = $request->input('query');
		$seguimientos = $query != null && $query != '' ? Seguimientos::where('tema', 'LIKE', "%$query%") : new Seguimientos();
		return view(self::DIR_TEMPLATE.'.lista', [
			'query' => $query,
			'seguimientos' => $seguimientos->orderBy('fecha_finalizacion', 'ASC')->orderBy('id', 'DESC')->paginate(10)
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
		return redirect()->route('seguimientos.seguimiento_detalle', ['seguimiento' => $seguimiento->id]);
	}
	public function seguimientoDetalle(Seguimientos $seguimiento){
		return view(self::DIR_TEMPLATE.'.seguimiento_detalle', [
			'seguimiento' => $seguimiento
		]);
	}
	public function nuevaTarea(FormSeguimientoTareaRequest $request, Seguimientos $seguimiento){
		$request['seguimiento_id'] = $seguimiento->id;
		SeguimientosTareas::saveData($request);
		return redirect()->route('seguimientos.seguimiento_detalle', ['seguimiento' => $seguimiento->id]);
	}
	public function cambiarEstadoTarea(Seguimientos $seguimiento, $tarea){
		$tarea = SeguimientosTareas::find($tarea);
		$tarea->finalizada = !$tarea->finalizada;
		$tarea->save();
		return response()->json([
			'message' => 'Estado cambiado de la tarea'
		]);
	}
	public function eliminarTarea($seguimiento, SeguimientosTareas $tarea){
		return view('elements.eliminar', [
			'url' => route('seguimientos.eliminar_tarea_action', ['seguimiento' => $seguimiento, 'tarea' => $tarea->id]),
			'message' => "¿Desea eliminar la tarea {$tarea->descripcion}?"
		]);
	}
	public function eliminarTareaAction($seguimiento, SeguimientosTareas $tarea){
		$tarea->delete();
		return redirect()->route('seguimientos.seguimiento_detalle', ['seguimiento' => $seguimiento]);
	}
}