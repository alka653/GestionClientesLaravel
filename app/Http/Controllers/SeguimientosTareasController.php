<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seguimientos;
use App\SeguimientosTareas;
use App\Http\Requests\FormSeguimientoTareaRequest;

class SeguimientosTareasController extends Controller{
	const DIR_TEMPLATE = 'tareas';
	public function lista(Seguimientos $seguimiento){
		return view(self::DIR_TEMPLATE.'.seguimiento_tareas', [
			'seguimiento' => $seguimiento
		]);
	}
	public function nuevaTarea(FormSeguimientoTareaRequest $request, Seguimientos $seguimiento){
		$request['seguimiento_id'] = $seguimiento->id;
		SeguimientosTareas::saveData($request);
		$seguimiento->fecha_cerrado = null;
		$seguimiento->save();
		return redirect()->route('seguimientos.seguimiento_tareas', ['seguimiento' => $seguimiento->id]);
	}
	public function cambiarEstadoTarea(Seguimientos $seguimiento, $tarea){
		$tarea = SeguimientosTareas::find($tarea);
		$tarea->finalizada = !$tarea->finalizada;
		$tarea->save();
		return response()->json([
			'message' => 'Estado cambiado de la tarea'
		]);
	}
	public function eliminar($seguimiento, SeguimientosTareas $tarea){
		return view('elements.eliminar', [
			'url' => route('seguimientos.eliminar_tarea_action', ['seguimiento' => $seguimiento, 'tarea' => $tarea->id]),
			'message' => "¿Desea eliminar la tarea {$tarea->descripcion}?"
		]);
	}
	public function eliminarTarea($seguimiento, SeguimientosTareas $tarea){
		$tarea->delete();
		return redirect()->route('seguimientos.seguimiento_tareas', ['seguimiento' => $seguimiento]);
	}
}