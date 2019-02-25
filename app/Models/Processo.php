<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model 
{
    protected $primaryKey = 'id_processo';
    public $table = 'adv_processos';
    protected $fillable = [
        'id_processo',
        'id_empresa',
        'id_usuario',
        'id_contrato',
        'id_cliente',
        'num_processo',
        'natureza',
        'vara',
        'pasta',
        'cartorio',
        'valor',
        'posicao_proc',
        'parte_contraria',
        'pc_endereco',
        'pc_email',
        'pc_bairro',
        'pc_cep',
        'pc_cidade',
        'pc_estado',
        'pc_telefone',
        'distribuida',
        'oficial_justica',
        'outros_dados',
        'superior_instancia',
        'data_entrada',
        'data_audiencia',
        'obs',
        'data_encerramento',
        'valor_final',
        'data_saida'
    ];
}

