<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosTareasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seguimientos_tareas', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('seguimiento_id')->unsigned();
			$table->foreign('seguimiento_id')->references('id')->on('seguimientos');
			$table->string('descripcion');
			$table->boolean('finalizada');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('seguimientos_tareas');
	}
}
