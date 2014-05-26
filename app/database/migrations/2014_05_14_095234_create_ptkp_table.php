<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePtkpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ptkp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_statuskawin', 10)->unique();
			$table->integer('jumlah_ptkp');
			$table->string('status_kawin', 50);
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
		Schema::drop('ptkp');
	}

}
