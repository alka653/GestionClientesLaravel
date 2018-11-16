<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller{
	const DIR_TEMPLATE = 'dashboard';
	public function index(){
		return view(self::DIR_TEMPLATE.'/index');
	}
}