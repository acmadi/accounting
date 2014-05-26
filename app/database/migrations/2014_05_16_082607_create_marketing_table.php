<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('marketing', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('kd_marketing', 10)->unique();
			$table->string('nama_depan', 30);
			$table->string('nama_belakang', 30);
			$table->string('username', 20);
			$table->string('password', 20);
			$table->string('email', 20);
			$table->string('no_hp', 20);
			$table->string('alamat', 200);
			$table->string('kota', 30);
			$table->string('propinsi', 50);
			$table->string('kode_pos', 20);
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
		Schema::drop('marketing');
	}

}
