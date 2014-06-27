<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailgajiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 
	public function up()
	{
		Schema::create('detailgaji', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_potongan', 10)->references('kd_potongan')->on('potongan');
			
			$table->string('nomor', 10)->unique();
			$table->integer('jumlah');	
			
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
		Schema::drop('detailgaji');
	}

}
