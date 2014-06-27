<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTicketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('support_ticket', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_marketing', 10)->references('kd_marketing')->on('marketing');
			
			$table->string('kd_ticket', 10)->unique();
			$table->string('nama_ticket', 50);
			$table->string('keterangan', 200);
			$table->string('lampiran', 100);
			$table->string('jenis_ticket', 30);
			$table->string('status_ticket', 30);
			
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
		Schema::drop('support_ticket');
	}

}
