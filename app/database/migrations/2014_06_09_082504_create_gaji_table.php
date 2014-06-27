<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGajiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 
	public function up()
	{
		Schema::create('gaji', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_tunjangan', 10)->references('kd_tunjangan')->on('tunjangan');
			$table->string('kd_lembur', 10)->references('kd_lembur')->on('lembur');
			$table->string('kd_pph', 10)->references('kd_pph')->on('pph');
			
			$table->string('kd_gaji', 10)->unique();			
			$table->string('tanggal');
			$table->integer('tun_jab');
			$table->integer('ttl_tunjangan');
			$table->integer('pph_thr');
			$table->integer('pph_gaji_sebulan');
			$table->integer('jml_potongan');
			$table->integer('ttl_lembur');
			$table->integer('gaji_pokok');
			$table->integer('gaji_bruto');
			$table->integer('gaji_bersih');

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
		Schema::drop('gaji');
	}

}
