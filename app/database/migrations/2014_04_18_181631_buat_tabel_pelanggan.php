<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPelanggan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelanggan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kode', 10)->unique();
			$table->string('nama', 50);
			$table->string('telp', 20);
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
		Schema::drop('pelanggan');
	}

}