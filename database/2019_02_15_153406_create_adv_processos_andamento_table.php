<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvProcessosAndamentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adv_processos_andamento', function(Blueprint $table)
		{
			$table->integer('id_andamento', true);
			$table->integer('id_processo')->default(0);
			$table->integer('id_empresa')->default(0);
			$table->dateTime('datahora')->default('0000-00-00 00:00:00');
			$table->text('andamento', 65535);
			$table->string('doc', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adv_processos_andamento');
	}

}
