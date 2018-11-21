<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFieldPersonasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('personas', function (Blueprint $table) {
			$table->string('dependencia')->nullable()->change();
			$table->string('referido')->nullable()->change();
			$table->string('palabra_clave')->nullable()->change();
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
