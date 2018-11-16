<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosServiciosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seguimientos_servicios', function (Blueprint $table) {
			$table->integer('seguimiento_id')->unsigned();
			$table->integer('servicio_id')->unsigned();
			$table->primary(['seguimiento_id', 'servicio_id']);
			$table->foreign('seguimiento_id')->references('id')->on('seguimientos');
			$table->foreign('servicio_id')->references('id')->on('servicios');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('seguimientos_servicios');
	}
}
