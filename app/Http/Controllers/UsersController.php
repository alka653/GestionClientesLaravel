<?php

namespace App\Http\Controllers;

use App\User;
use App\Personas;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\FormUserRequest;
use App\Http\Requests\FormClienteRequest;

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
			'roles' => ['' => 'Seleccione una opción'] + Role::pluck('name', 'id')->toArray(),
			'route' => ['usuarios.nuevo'],
			'method' => 'post'
		]);
	}
	public function editar(User $usuario){
		$role = $usuario->getRoleNames()->count() > 0 ? Role::where('name', $usuario->getRoleNames()[0])->first()->id : '';
		$object = (object)array_merge($usuario->toArray(), $usuario->persona->toArray(), ['role' => $role]);
		return view(self::DIR_TEMPLATE.'.form', [
			'usuario' => $object,
			'roles' => ['' => 'Seleccione una opción'] + Role::pluck('name', 'id')->toArray(),
			'route' => ['usuarios.actualizar_usuario', $usuario->id],
			'method' => 'put'
		]);
	}
	public function guardarUsuario(FormUserRequest $request_user, FormClienteRequest $request){
		if($request->usuario){
			dd($request_user);
			$request->persona = $request->input('id');
			$persona = Personas::updateData($request);
		}else{
			$persona = Personas::saveData($request);
			$request_user['persona_id'] = $persona->id;
			$request_user['nombre'] = $persona->nombre;
			$request_user['apellido'] = $persona->apellido;
			$usuario = User::saveData($request_user);
		}
		return redirect()->route('usuarios.lista');
	}
}