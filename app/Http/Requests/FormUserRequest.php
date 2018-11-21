<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUserRequest extends FormRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		return [
			//'role' => 'required'
		];
	}
	public function messages(){
		return [
			//'role.required' => 'Debe seleccionar una opción'
		];
	}
}