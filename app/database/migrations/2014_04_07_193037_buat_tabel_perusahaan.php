<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPerusahaan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perusahaan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('logo', 30);
			$table->string('nama', 50);
			$table->string('alamat', 100);
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
		Schema::drop('perusahaan');
	}

}