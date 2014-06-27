<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePph42Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pph4_2', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_perusahaan', 10)->references('kd_perusahaan')->on('perusahaan1');
			
			$table->string('id_pph42', 10)->unique();			
			$table->integer('jumlah_omzet');
			$table->string('bulan', 15);
			$table->integer('tahun');
			$table->string('tanggal', 5);
			$table->string('nama_penyetor', 50);
			
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
		Schema::drop('pph4_2');
	}

}
