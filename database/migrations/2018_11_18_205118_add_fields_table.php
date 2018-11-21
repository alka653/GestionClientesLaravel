<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('personas', function (Blueprint $table) {
			$table->string('numero_telefonico', 10)->nullable();
			$table->string('dependencia', 10)->nullable();
			$table->string('referido', 10)->nullable();
			$table->string('palabra_clave', 10)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('personas', function (Blueprint $table) {
			//
		});
	}
}
