<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSeguimientoTareaRequest extends FormRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		return [
			'tarea_descripcion' => 'required|max:190'
		];
	}
	public function messages(){
		return [
			'tarea_descripcion.required' => 'Debe ingresar una descripción',
			'tarea_descripcion.max' => 'La descripción no puede superar los 190 caracteres',
		];
	}
}