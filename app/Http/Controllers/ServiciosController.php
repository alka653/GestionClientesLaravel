<?php

namespace App\Http\Controllers;

use App\Servicios;
use Illuminate\Http\Request;
use App\Http\Requests\FormServicioRequest;

class ServiciosController extends Controller{
	const DIR_TEMPLATE = 'servicios';
	public function lista(Request $request){
		$query = $request->input('query');
		$servicios = $query != null && $query != '' ? Servicios::where('nombre', 'LIKE', "%$query%")->orWhere('descripcion', 'LIKE', "%$query%") : new Servicios();
		return view(self::DIR_TEMPLATE.'.lista', [
			'query' => $query,
			'servicios' => $servicios->paginate(10)
		]);
	}
	public function nuevo(){
		return view(self::DIR_TEMPLATE.'.form', [
			'servicio' => new Servicios(),
			'route' => ['servicios.guardar_servicio'],
			'method' => 'post'
		]);
	}
	public function editar(Servicios $servicio){
		return view(self::DIR_TEMPLATE.'.form', [
			'servicio' => $servicio,
			'route' => ['servicios.actualizar_servicio', $servicio->id],
			'method' => 'put'
		]);
	}
	public function guardarServicio(FormServicioRequest $request){
		if($request->servicio){
			$servicio = Servicios::updateData($request);
		}else{
			$servicio = Servicios::saveData($request);
		}
		return redirect()->route('servicios.lista');
	}
	public function eliminar(Servicios $servicio){
		return view('elements.eliminar', [
			'url' => route('servicios.eliminar_servicio', ['servicio' => $servicio->id]),
			'message' => "¿Desea eliminar el servicio {$servicio->nombre}?"
		]);
	}
	public function eliminarServicio(Servicios $servicio){
		$servicio->delete();
		return redirect()->route('servicios.lista');
	}
}