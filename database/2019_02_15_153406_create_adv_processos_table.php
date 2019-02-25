<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvProcessosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adv_processos', function(Blueprint $table)
		{
			$table->integer('id_processo', true);
			$table->integer('id_empresa')->default(0)->index('id_empresa');
			$table->integer('id_usuario')->default(0)->index('id_usuario');
			$table->integer('id_contrato')->default(0)->index('id_contrato');
			$table->integer('id_cliente')->default(0)->index('id_cliente');
			$table->string('num_processo', 20)->default('');
			$table->string('natureza', 100)->nullable();
			$table->string('vara', 100)->nullable();
			$table->string('pasta', 20)->nullable();
			$table->string('cartorio', 100)->nullable();
			$table->decimal('valor', 15)->nullable();
			$table->string('posicao_proc', 100)->nullable();
			$table->string('parte_contraria', 80)->nullable();
			$table->string('pc_endereco', 80)->nullable();
			$table->string('pc_bairro', 60)->nullable();
			$table->string('pc_cep', 8)->nullable();
			$table->string('pc_cidade', 60)->nullable();
			$table->char('pc_estado', 2)->nullable();
			$table->string('pc_telefone', 10)->nullable();
			$table->date('distribuida')->nullable();
			$table->string('oficial_justica', 80)->nullable();
			$table->text('outros_dados', 65535)->nullable();
			$table->text('superior_instancia', 65535)->nullable();
			$table->date('data_entrada')->nullable();
			$table->dateTime('data_audiencia')->nullable();
			$table->text('obs', 65535)->nullable();
			$table->date('data_encerramento')->nullable();
			$table->decimal('valor_final', 15)->nullable();
			$table->date('data_saida')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adv_processos');
	}

}
