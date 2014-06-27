<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agenda', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_marketing', 10)->references('kd_marketing')->on('marketing');
			
			$table->string('kd_agenda', 10)->unique();			
			$table->string('nama_agenda', 50);
			$table->string('keterangan', 200);
			
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
		Schema::drop('agenda');
	}

}
