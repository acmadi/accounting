<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 
	public function up()
	{
		Schema::create('owner', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('kd_karyawan', 10)->references('kd_karyawan')->on('karyawan');
			$table->string('kd_perusahaan', 10)->references('kd_perusahaan')->on('perusahaan1');
			$table->string('kd_marketing', 10)->references('kd_marketing')->on('marketing');
			$table->string('id_status', 10)->references('id_status')->on('status');

			$table->string('kd_owner', 10)->unique();	
			$table->string('username', 30);
			$table->string('password', 30);
			$table->string('nama_depan', 30);
			$table->string('nama_belakang', 30);
			$table->string('handphone', 20);
			$table->string('npwp', 20);
			$table->string('alamat', 200);
			$table->string('kota', 30);
			$table->string('propinsi', 30);
			$table->string('kode_pos', 10);
			$table->string('email', 30);			
			
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
		Schema::drop('owner');
	}

}
