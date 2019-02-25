<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adv_clientes', function(Blueprint $table)
		{
			$table->integer('id_cliente', true);
			$table->integer('id_empresa')->default(0);
			$table->integer('id_usuario')->default(0)->index('id_usuario');
			$table->char('tipo', 1)->default('');
			$table->string('nome', 80)->default('');
			$table->string('endereco', 80)->nullable();
			$table->string('bairro', 60)->nullable();
			$table->string('cep', 8)->nullable();
			$table->string('cidade', 60)->nullable();
			$table->char('estado', 2)->nullable();
			$table->string('telefone', 10)->nullable();
			$table->string('celular_recado', 10)->nullable();
			$table->string('email', 60)->nullable();
			$table->string('site', 60)->nullable();
			$table->string('rg_ie', 20)->nullable();
			$table->string('cpf_cnpj', 20)->nullable();
			$table->string('ctps', 50)->nullable();
			$table->string('serie', 20)->nullable();
			$table->date('data_nasc')->nullable();
			$table->date('data_nasc_mae')->default('0000-00-00');
			$table->char('sexo', 1)->nullable();
			$table->string('nacionalidade', 80)->nullable();
			$table->char('estado_civil', 1)->nullable();
			$table->string('profissao', 50)->nullable();
			$table->text('obs', 65535)->nullable();
			$table->date('data_cad')->default('0000-00-00');
			$table->date('data_saida')->nullable();
			$table->index(['id_empresa','id_usuario'], 'id_empresa');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adv_clientes');
	}

}
