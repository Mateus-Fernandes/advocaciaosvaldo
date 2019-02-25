<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvContratosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adv_contratos', function(Blueprint $table)
		{
			$table->integer('id_contrato', true);
			$table->integer('id_empresa')->default(0)->index('id_empresa');
			$table->integer('id_usuario')->default(0)->index('id_usuario');
			$table->integer('id_cliente')->default(0)->index('id_cliente');
			$table->string('contrato', 50)->nullable();
			$table->string('procuracao', 50)->nullable();
			$table->char('tipo', 1)->default('');
			$table->char('forma_pagto', 1)->default('');
			$table->decimal('honorinicial_val', 15)->nullable();
			$table->date('honorinicial_data')->nullable();
			$table->decimal('honorfinal_porc', 4, 3)->nullable();
			$table->decimal('honormensal_val', 15)->nullable();
			$table->integer('honormensal_parc')->nullable();
			$table->date('honormensal_data')->default('0000-00-00');
			$table->text('historico', 65535)->nullable();
			$table->dateTime('data_cadastro')->default('0000-00-00 00:00:00');
			$table->date('data_saida')->nullable();
			$table->string('contrato_c', 100)->nullable();
			$table->string('contrato_empresa', 100)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adv_contratos');
	}

}
