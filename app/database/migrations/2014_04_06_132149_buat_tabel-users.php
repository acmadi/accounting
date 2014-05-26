<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('foto', 30);
			$table->string('nama', 50);
			$table->string('nama_belakang', 50);
			$table->string('email', 50);
			$table->smallInteger('akses');
			$table->string('alamat', 100);
			$table->string('username', 20);
			$table->string('password', 100);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}