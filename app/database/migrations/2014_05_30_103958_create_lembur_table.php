<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLemburTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lembur', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_tunjangan', 10)->references('kd_tunjangan')->on('tunjangan');
			
			$table->string('kd_lembur', 10)->unique();
			$table->integer('jml_lembur_biasa');	
			$table->integer('jml_lembur_libur');
			$table->integer('tarif_biasa');
			$table->integer('tarif_libur');
			$table->integer('total');			
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
		Schema::drop('lembur');
	}

}
