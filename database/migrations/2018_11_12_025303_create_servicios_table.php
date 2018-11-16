<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('servicios', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->decimal('precio', 10, 2)->nullable();
			$table->string('estado', 2);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('servicios');
	}
}
