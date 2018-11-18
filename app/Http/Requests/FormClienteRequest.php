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
			'email.unique' => 'El email ya se encuentra registrado'
		];
	}
}