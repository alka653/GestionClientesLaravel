<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosAdquiridosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicios_adquiridos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('persona_id')->unsigned();
			$table->date('fecha_adquirido');
			$table->date('fecha_vencimiento');
			$table->decimal('precio_total', 10, 2);
			$table->integer('user_id')->unsigned();
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
		Schema::dropIfExists('servicios_adquiridos');
	}
}
