<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosAdquiridosListaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicios_adquiridos_lista', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('servicio_adquirido_id')->unsigned();
			$table->integer('servicio_id')->unsigned();
			$table->integer('cantidad')->unsigned();
			$table->decimal('precio', 10, 2);
			$table->foreign('servicio_adquirido_id')->references('id')->on('servicios_adquiridos');
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
		Schema::dropIfExists('servicios_adquiridos_lista');
	}
}
