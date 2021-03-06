<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller{
	use AuthenticatesUsers;
	protected $redirectTo = '/';
	public function __construct(){
		$this->middleware('guest')->except('logout');
	}
	protected function credentials(Request $request){
		return [
			'username' => $request->get($this->username()),
			'password' => $request->password,
		];
	}
}