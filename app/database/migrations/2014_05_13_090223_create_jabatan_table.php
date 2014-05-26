<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJabatanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jabatan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_jab', 10)->unique();
			$table->string('nama_jabatan', 50);
			$table->integer('tun_kes');
			$table->integer('tun_mkn');
			$table->integer('tun_transport');
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
		Schema::drop('jabatan');
	}

}
