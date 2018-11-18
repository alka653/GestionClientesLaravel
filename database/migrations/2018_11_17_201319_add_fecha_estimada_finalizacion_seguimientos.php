<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFechaEstimadaFinalizacionSeguimientos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('seguimientos', function (Blueprint $table) {
			$table->string('tema')->nullable();
			$table->dropColumn('fecha_apertura');
			$table->dropColumn('fecha_cerrado');
			$table->dateTime('fecha_finalizacion')->nullable();
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
			$table->dropColumn('fecha_finalizacion');
			$table->date('fecha_apertura');
			$table->date('fecha_cerrado')->nullable();
		});
	}
}
