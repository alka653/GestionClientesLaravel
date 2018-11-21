<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Constants;

class User extends Authenticatable{
	use Notifiable;
	use HasRoles;
	protected $guard_name = 'web';
	protected $guarded = [];
	protected $fillable = [
		'username', 'password', 'estado', 'persona_id'
	];
	protected $hidden = [
		'password', 'remember_token',
	];
	public function getEstadoAttribute($estado){
		return Constants::ESTADOS[$estado]['text'];
	}
	public function persona(){
		return $this->belongsTo('App\Personas', 'persona_id');
	}
	public static function saveData($request){
		$data = $request->input();
		$data['nombre'] = iconv("UTF-8", "ASCII//TRANSLIT", $data['nombre']);
		$data['apellido'] = iconv("UTF-8", "ASCII//TRANSLIT", $data['apellido']);
		$username = str_replace("'", "", strtolower(explode(' ', $data['nombre'])[0].'.'.explode(' ', $data['apellido'])[0]));
		$count_username = User::where('username', 'LIKE', '%'.$username.'%')->count();
		$username = $username.($count_username > 0 ? '.'.($count_username + 1) : '');
		return User::create([
			'persona_id' => $data['persona_id'],
			'username' => $username,
			'estado' => 'A',
			'password' => bcrypt($username),
		]);
	}
	public static function updatePassword($request){
		$persona = User::find($request->usuario);
		$persona->nombre = bcrypt($request->input('nombre'));
		$persona->save();
		return $persona;
	}
}