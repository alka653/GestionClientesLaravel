<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\FormUserRequest;
use App\Http\Requests\FormClienteRequest;

class FormMultipleUserRequest extends FormRequest{
	public function authorize(){
		return true;
	}
	public function rules(){
		$rules = [];
		$formRequests = [
			FormClienteRequest::class,
			FormUserRequest::class,
		];
		foreach ($formRequests as $source) {
			$rules = array_merge($rules, (new $source)->rules());
		}
		return $rules;
	}
}