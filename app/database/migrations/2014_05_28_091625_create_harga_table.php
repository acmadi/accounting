<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHargaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('harga', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_harga', 10)->unique();
			$table->string('nama_harga', 100);
			$table->string('harga', 20);
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
		Schema::drop('harga');
	}

}
