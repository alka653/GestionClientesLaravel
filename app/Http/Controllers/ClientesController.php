<?php

namespace App\Http\Controllers;

use App\User;
use App\Personas;
use App\Seguimientos;
use App\SeguimientosTareas;
use Illuminate\Http\Request;
use App\Http\Requests\FormClienteRequest;

class ClientesController extends Controller{
	const DIR_TEMPLATE = 'clientes';
	public function lista(Request $request){
		$query = $request->input('query');
		$personas = $query != null && $query != '' ? Personas::where('nombre', 'LIKE', "%$query%")->orWhere('apellido', 'LIKE', "%$query%")->orWhere('email', 'LIKE', "%$query%") : new Personas();
		$users = User::get()->map(function($user){
			return $user->only(['persona_id']);
		})->toArray();
		return view(self::DIR_TEMPLATE.'.lista', [
			'query' => $query,
			'buscar' => true,
			'url' => route('clientes.lista'),
			'placeholder' => 'Busca un contácto',
			'personas' => $personas->whereNotIn('id', $users)->paginate(10)
		]);
	}
	public function nuevo(){
		return view(self::DIR_TEMPLATE.'.form', [
			'persona' => new Personas(),
			'route' => ['clientes.nuevo'],
			'method' => 'post'
		]);
	}
	public function editar(Personas $persona){
		return view(self::DIR_TEMPLATE.'.form', [
			'persona' => $persona,
			'route' => ['clientes.actualizar_cliente', $persona->id],
			'method' => 'put'
		]);
	}
	public function guardarCliente(FormClienteRequest $request){
		if($request->persona){
			$persona = Personas::updateData($request);
		}else{
			$persona = Personas::saveData($request);
		}
		return redirect()->route('clientes.lista');
	}
	public function eliminar(Personas $persona){
		return view('elements.eliminar', [
			'url' => route('clientes.eliminar_cliente', ['persona' => $persona->id]),
			'message' => "¿Desea eliminar el contacto {$persona->nombre} {$persona->apellido}?"
		]);
	}
	public function eliminarCliente(Personas $persona){
		$seguimiento = Seguimientos::where('persona_id', $persona->id);
		if($seguimiento->count() > 0){
			SeguimientosTareas::where('seguimiento_id', $seguimiento->first()->id)->delete();
			$seguimiento->delete();
		}
		$persona->delete();
		return redirect()->route('clientes.lista');
	}
}