<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdvTrabalhistaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adv_trabalhista', function(Blueprint $table)
		{
			$table->integer('id_contrato')->default(0)->index('idcontrato');
			$table->string('empresa', 80)->nullable();
			$table->string('emp_endereco', 80)->nullable();
			$table->string('emp_bairro', 60)->nullable();
			$table->string('emp_cidade', 60)->nullable();
			$table->char('emp_estado', 2)->nullable();
			$table->string('emp_cep', 8)->nullable();
			$table->string('emp_cnpj', 20)->nullable();
			$table->char('emp_servico', 1)->nullable();
			$table->string('emp_serv_nome', 80)->nullable();
			$table->string('emp_serv_end', 80)->nullable();
			$table->string('emp_serv_bairro', 60)->nullable();
			$table->string('emp_serv_cidade', 60)->nullable();
			$table->char('emp_serv_estado', 2)->nullable();
			$table->string('emp_serv_cep', 8)->nullable();
			$table->string('emp_serv_cnpj', 20)->nullable();
			$table->char('tipo_contratacao', 1)->nullable();
			$table->date('data_admissao')->nullable()->default('0000-00-00');
			$table->date('data_registro')->nullable()->default('0000-00-00');
			$table->date('data_demissao')->nullable()->default('0000-00-00');
			$table->char('baixa_ctps', 1)->nullable();
			$table->string('baixa_ctps_quando', 50)->nullable();
			$table->string('pis', 30)->nullable();
			$table->integer('jornsem_dia_inicio')->nullable()->default(0);
			$table->integer('jornsem_dia_fim')->nullable()->default(0);
			$table->time('jornsem_hora_inicio')->nullable()->default('00:00:00');
			$table->time('jornsem_hora_fim')->nullable()->default('00:00:00');
			$table->time('jornsab_hora_inicio')->nullable();
			$table->time('jornsab_hora_fim')->nullable();
			$table->time('jorndom_hora_inicio')->nullable();
			$table->time('jorndom_hora_fim')->nullable();
			$table->text('jorn_obs', 65535)->nullable();
			$table->string('intervalo', 30)->nullable();
			$table->char('intervalo_sab', 1)->nullable();
			$table->char('intervalo_dom', 1)->nullable();
			$table->char('batia_cartao', 1)->nullable();
			$table->time('batia_cartao_horario_inicio')->nullable();
			$table->time('batia_cartao_horario_fim')->nullable();
			$table->decimal('maior_salario', 15)->nullable()->default(0.00);
			$table->char('salario_porfora', 1)->nullable();
			$table->decimal('salario_porfora_val', 15)->nullable();
			$table->char('vale_transporte', 1)->nullable();
			$table->integer('num_conducao')->nullable();
			$table->string('tipo_conducao', 30)->nullable();
			$table->string('motivo_rescisao', 100)->nullable();
			$table->char('aviso_previo', 1)->nullable();
			$table->integer('num_ferias')->nullable()->default(0);
			$table->string('num_ferias_anos', 30)->nullable();
			$table->char('ferias_traba', 1)->nullable();
			$table->string('ferias_traba_num', 30)->nullable();
			$table->char('ferias_venc_terco', 1)->nullable();
			$table->char('ferias_prop_terco', 1)->nullable();
			$table->char('decimoterc_atrasado', 1)->nullable();
			$table->string('decimoterc_anos', 30)->nullable();
			$table->char('decimoterc_prop', 1)->nullable();
			$table->char('fgts_depositado', 1)->nullable();
			$table->decimal('fgts_depositado_qto', 15)->nullable();
			$table->char('verbas_rescisorias', 1)->nullable();
			$table->decimal('verbas_rescisorias_qto', 15)->nullable();
			$table->char('material_insalubre', 1)->nullable();
			$table->string('material_insalubre_quais', 100)->nullable();
			$table->char('recebia_adicional', 1)->nullable();
			$table->char('periculosidade', 1)->nullable();
			$table->char('equiparacao_salarial', 1)->nullable();
			$table->text('paradigma', 65535)->nullable();
			$table->text('texto_declaracao', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('adv_trabalhista');
	}

}
