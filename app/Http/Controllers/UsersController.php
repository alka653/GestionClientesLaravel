<?php

namespace App\Http\Controllers;

use App\User;
use App\Personas;
use Illuminate\Http\Request;
use App\Http\Requests\FormUserRequest;

class UsersController extends Controller{
	const DIR_TEMPLATE = 'users';
	public function lista(Request $request){
		$query = $request->input('query');
		$personas = $query != null && $query != '' ? Personas::where('nombre', 'LIKE', "%$query%")->orWhere('apellido', 'LIKE', "%$query%")->orWhere('email', 'LIKE', "%$query%")->map(function($persona){
			return $persona->only(['id']);
		})->toArray() : [];
		$usuarios = $query != null && $query != '' ? User::where('username', 'LIKE', "%$query%")->orWhereIn('persona_id', $personas) : new User();
		return view(self::DIR_TEMPLATE.'.lista', [
			'query' => $query,
			'usuarios' => $usuarios->with('persona')->paginate(10)
		]);
	}
	public function nuevo(){
		return view(self::DIR_TEMPLATE.'.form', [
			'usuario' => User::with('persona'),
			'route' => ['usuarios.nuevo'],
			'method' => 'post'
		]);
	}
	public function editar(User $usuario){
		return view(self::DIR_TEMPLATE.'.form', [
			'usuario' => $usuario,
			'route' => ['usuarios.actualizar_usuario', $usuario->id],
			'method' => 'put'
		]);
	}
	public function guardarUsuario(FormUserRequest $request){
		dd($request->usuario);
		if($request->usuario){
			$usuario = Usuarios::updateData($request);
		}else{
			$usuario = Usuarios::saveData($request);
		}
		return redirect()->route('servicios.lista');
	}
}