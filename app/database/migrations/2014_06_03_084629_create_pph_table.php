<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePphTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	public function up()
	{
		Schema::create('pph', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_pkp', 10)->references('kd_pkp')->on('pkp');
			$table->string('kd_lembur', 10)->references('kd_lembur')->on('lembur');
			
			$table->string('kd_pph', 10)->unique();
			$table->integer('pph_thr');
			$table->integer('pph_gaji_sebulan');
			
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
		Schema::drop('pph');
	}

}
