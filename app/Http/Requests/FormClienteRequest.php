<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormClienteRequest extends FormRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		$persona = '';
		if($this->persona || $this->id){
			$persona = $this->persona ? $this->persona : $this->id;
		}
		return [
			'nombre' => 'required|max:40,nombre,'.$persona,
			'apellido' => 'required|max:40,apellido,'.$persona,
			'email' => 'required|max:50|unique:personas,email,'.$persona,
			'numero_telefonico' => 'max:10,numero_telefonico,'.$persona,
			'dependencia' => 'max:190,dependencia,'.$persona,
			'palabra_clave' => 'max:190,palabra_clave,'.$persona
		];
	}
	public function messages(){
		return [
			'nombre.required' => 'Debe ingresar el nombre',
			'nombre.max' => 'El nombre no puede superar los 40 caracteres',
			'apellido.required' => 'Debe ingresar el apellido',
			'apellido.max' => 'El apellido no puede superar los 40 caracteres',
			'email.required' => 'Debe ingresar el correo electrónico',
			'email.max' => 'El email no puede superar los 50 caracteres',
			'email.unique' => 'El email ya se encuentra registrado',
			'numero_telefonico.max' => 'El número telefónico no puede superar los 10 caracteres',
			'dependencia.max' => 'La dependencia no puede superar los 190 caracteres',
			'palabra_clave.max' => 'Las palabras claves no puede superar los 190 caracteres',
		];
	}
}