<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasNumerosTelefonosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('personas_numeros_telefonos', function (Blueprint $table) {
			$table->integer('persona_id')->unsigned();
			$table->string('numero_telefono', 15);
			$table->primary(['persona_id', 'numero_telefono']);
			$table->foreign('persona_id')->references('id')->on('personas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('personas_numeros_telefonos');
	}
}
