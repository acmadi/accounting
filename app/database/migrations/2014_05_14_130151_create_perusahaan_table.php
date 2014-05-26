<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerusahaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::create('perusahaan1', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_perusahaan', 10)->unique();
			$table->string('nama_perusahaan', 100);
			$table->string('alamat', 200);
			$table->string('kota', 50);
			$table->string('propinsi', 50);
			$table->string('kode_pos', 10);
			$table->string('handphone', 20);
			$table->string('telephone', 20);
			$table->string('fax', 20);
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
		Schema::drop('perusahaan1');
	}

}
