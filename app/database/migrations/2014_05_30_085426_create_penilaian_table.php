<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penilaian', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->string('kd_absen', 10)->references('kd_absen')->on('absen');
			
			$table->string('kd_penilaian', 10)->unique();	
			$table->string('kinerja', 30);		
			
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
		Schema::drop('penilaian');
	}

}
