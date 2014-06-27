<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSewaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sewa', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_harga', 10)->references('kd_harga')->on('harga');
			
			$table->string('kd_sewa', 10)->unique();			
			$table->string('nama_sewa', 100);
			
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
		Schema::drop('sewa');
	}

}
