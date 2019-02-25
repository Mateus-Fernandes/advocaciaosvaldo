<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratoc extends Model 
{
    protected $primaryKey = 'id_contrato';
    public $table = 'adv_contratos';
    protected $fillable = [
        'id_contrato',
        'id_cliente'
    ];
}

