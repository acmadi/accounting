<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('karyawan', function(Blueprint $table)
		{
			$table->increments('id');

			
			$table->string('kd_agama', 10)->references('kd_agama')->on('agama');
			$table->string('kd_dep', 10)->references('kd_dep')->on('departemen');
			$table->string('kd_jab', 10)->references('kd_jab')->on('jabatan');
			$table->string('kd_gol', 10)->references('kd_gol')->on('golongan');
			$table->string('kd_statuskawin', 10)->references('kd_statuskawin')->on('ptkp');

			$table->string('kd_karyawan', 10)->unique();			
			$table->string('nik', 30);
			$table->string('nama_depan', 30);
			$table->string('nama_belakang', 30);
			$table->string('jen_kel', 20);
			$table->string('tempat_lahir', 30);
			$table->string('tgl_lahir', 30);
			$table->string('pendidikan', 50);
			$table->string('tgl_masuk', 30);
			$table->string('tgl_keluar', 30);
			$table->string('alamat', 200);
			$table->string('desa', 50);
			$table->string('kota', 30);
			$table->string('propinsi', 30);
			$table->string('kode_pos', 10);
			$table->string('no_telephone', 20);
			$table->string('no_handphone', 20);
			$table->string('email', 30);
			$table->string('npwp', 30);
			$table->string('foto', 100);


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
		Schema::drop('karyawan');
	}

}
