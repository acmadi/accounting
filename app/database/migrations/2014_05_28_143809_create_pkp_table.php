<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePkpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pkp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_pkp', 10)->unique();
			$table->integer('batas_pkp');
			$table->integer('tarif');
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
		Schema::drop('pkp');
	}

}
