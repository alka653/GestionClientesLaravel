<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model{
	protected $guarded = [];
	protected $fillable = ['nombre', 'apellido', 'email', 'foto'];
	public function getFotoAttribute($foto){
		return $foto ? \Storage::disk('public')->url($foto) : asset('img/user.png');
	}
	public static function saveData($request){
		return Personas::create([
			'nombre' => $request->input('nombre'),
			'apellido' => $request->input('apellido'),
			'email' => $request->input('email'),
			'foto' => $request->file('foto') ? $request->file('foto')->store('users', 'public'): ''
		]);
	}
	public static function updateData($request){
		$persona = Personas::find($request->persona);
		$persona->nombre = $request->input('nombre');
		$persona->apellido = $request->input('apellido');
		$persona->email = $request->input('email');
		if($request->file('foto')){
			$persona->foto = $request->file('foto')->store('users', 'public');
		}
		$persona->save();
		return $persona;
	}
}