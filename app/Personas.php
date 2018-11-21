<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model{
	protected $guarded = [];
	protected $fillable = ['nombre', 'apellido', 'email', 'foto', 'numero_telefonico', 'dependencia', 'referido', 'palabra_clave'];
	public function getFotoAttribute($foto){
		return $foto ? \Storage::disk('public')->url($foto) : asset('img/user.png');
	}
	public static function saveData($request){
		$data = [
			'nombre' => $request->input('nombre'),
			'apellido' => $request->input('apellido'),
			'email' => $request->input('email'),
			'foto' => $request->file('foto') ? $request->file('foto')->store('users', 'public'): '',
			'numero_telefonico' => $request->input('numero_telefonico'),
			'dependencia' => $request->input('dependencia'),
			'referido' => $request->input('referido'),
			'palabra_clave' => $request->input('palabra_clave')
		];
		return Personas::create($data);
	}
	public static function updateData($request){
		$persona = Personas::find($request->persona);
		$persona->nombre = $request->input('nombre');
		$persona->apellido = $request->input('apellido');
		$persona->email = $request->input('email');
		if($request->file('foto')){
			$persona->foto = $request->file('foto')->store('users', 'public');
		}
		if($request->input('numero_telefonico')){
			$persona->numero_telefonico = $request->input('numero_telefonico');
		}
		if($request->input('dependencia')){
			$persona->dependencia = $request->input('dependencia');
		}
		if($request->input('referido')){
			$persona->referido = $request->input('referido');
		}
		if($request->input('palabra_clave')){
			$persona->palabra_clave = $request->input('palabra_clave');
		}
		$persona->save();
		return $persona;
	}
}