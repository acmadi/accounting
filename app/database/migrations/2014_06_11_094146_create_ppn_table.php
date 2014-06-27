<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpnTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppn', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_perusahaan', 10)->references('kd_perusahaan')->on('perusahaan1');
			
			$table->string('kd_ppn', 10)->unique();			
			$table->integer('ppn_pembelian');
			$table->integer('ppn_penjalan');
			$table->string('bulan', 30);
			$table->integer('tahun');
			$table->integer('biaya_membangun_sendiri');
			$table->integer('penomoran_faktur');
			$table->integer('penjualan_tanpa_faktur');
			
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
		Schema::drop('ppn');
	}

}
