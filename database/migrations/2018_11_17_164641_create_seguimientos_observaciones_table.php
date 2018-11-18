<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosObservacionesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seguimientos_observaciones', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('seguimiento_id')->unsigned();
			$table->string('observacion');
			$table->foreign('seguimiento_id')->references('id')->on('seguimientos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('seguimientos_observaciones');
	}
}
