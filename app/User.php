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
		'username', 'password', 'estado'
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
}