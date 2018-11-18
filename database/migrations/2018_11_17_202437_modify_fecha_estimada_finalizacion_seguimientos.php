<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFechaEstimadaFinalizacionSeguimientos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seguimientos', function (Blueprint $table) {
			$table->dateTime('fecha_apertura');
			$table->dateTime('fecha_cerrado')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('seguimientos', function (Blueprint $table) {
			//
		});
	}
}
