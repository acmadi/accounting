<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absensi', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_karyawan', 10)->references('kd_karyawan')->on('karyawan');
			
			$table->string('kd_absen', 10)->unique();
			$table->date('tanggal');
			$table->string('cuti');
			$table->string('ijin');
			$table->string('sakit');
			$table->string('alpha');
			
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
		Schema::drop('absensi');
	}

}
