<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormServicioRequest extends FormRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		$servicio = $this->servicio ? $this->servicio : '';
		return [
			'nombre' => 'required|max:80|unique:servicios,nombre,'.$servicio,
			'descripcion' => 'max:100,descripcion,'.$servicio,
			'precio' => 'max:15,precio,'.$servicio,
		];
	}
	public function messages(){
		return [
			'nombre.required' => 'Debe ingresar el nombre',
			'nombre.max' => 'El nombre no puede superar los 80 caracteres',
			'nombre.unique' => 'El nombre ya se encuentra registrado',
			'descripcion.max' => 'La descripción no puede superar los 100 caracteres',
			'precio.max' => 'El precio no puede superar los 15 caracteres',
		];
	}
}