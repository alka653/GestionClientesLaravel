<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seguimientos', function (Blueprint $table) {
			$table->increments('id');
			$table->date('fecha_apertura');
			$table->date('fecha_cerrado')->nullable();
			$table->integer('persona_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('estado', 2);
			$table->foreign('persona_id')->references('id')->on('personas');
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('seguimientos');
	}
}
