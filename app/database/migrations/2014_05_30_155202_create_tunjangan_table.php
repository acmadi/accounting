<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjanganTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tunjangan', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_absen', 10)->references('kd_absen')->on('absensi');
			
			$table->string('kd_tunjangan', 10)->unique();
			$table->integer('ttl_tun_kes');
			$table->integer('ttl_tun_makan');
			$table->integer('ttl_tun_transport');
			$table->integer('ttl_tun');
			
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
		Schema::drop('tunjangan');
	}

}
