<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSeguimientoRequest extends FormRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		$seguimiento = $this->seguimiento ? $this->seguimiento : '';
		return [
			'tema' => 'max:190,tema,'.$seguimiento,
			'fecha_finalizacion' => 'required|max:100,fecha_finalizacion,'.$seguimiento,
			'persona_id' => 'required|max:100,persona_id,'.$seguimiento,
		];
	}
	public function messages(){
		return [
			'tema.max' => 'El tema no puede superar los 190 caracteres',
			'fecha_finalizacion.required' => 'Debe ingresar la fecha de finalización',
			'persona_id.required' => 'Debe seleccionar una persona',
		];
	}
}
