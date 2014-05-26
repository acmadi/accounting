<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPembelian extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pembelian', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pemasok', 10)->references('kode')->on('pemasok');
			$table->string('barang', 10)->references('kode')->on('barang');
			$table->integer('jumlah');
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
		Schema::drop('pembelian');
	}

}