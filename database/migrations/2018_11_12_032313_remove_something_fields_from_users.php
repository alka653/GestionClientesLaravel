<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSomethingFieldsFromUsers extends Migration
{
	 /**
	  * Run the migrations.
	  *
	  * @return void
	  */
	 public function up()
	 {
		  Schema::table('users', function (Blueprint $table) {
			   $table->string('username');
			   $table->integer('persona_id')->unsigned();
			   $table->foreign('persona_id')->references('id')->on('personas');
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
		  Schema::table('users', function (Blueprint $table) {
			   $table->dropForeign('users_persona_id_foreign');
			   $table->dropColumn('persona_id');
			   $table->dropColumn('username');
			   $table->dropColumn('email');
			   $table->dropColumn('estado');
		  });
	 }
}
