<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolonganTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('golongan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_gol', 10)->unique();
			$table->string('gol_pok', 50);
			$table->integer('tun_jab');
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
		Schema::drop('golongan');
	}

}
