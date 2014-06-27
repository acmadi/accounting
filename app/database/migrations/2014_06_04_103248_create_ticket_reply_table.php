<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketReplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_reply', function(Blueprint $table)
		{
			$table->increments('id');		
			$table->string('kd_ticket', 10)->references('kd_ticket')->on('support_ticket');
			
			$table->string('kd_reply', 10)->unique();			
			$table->string('nama_reply', 50);
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
		Schema::drop('ticket_reply');
	}

}
