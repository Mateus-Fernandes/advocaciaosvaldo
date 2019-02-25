<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model 
{
    protected $primaryKey = 'id_cliente';
    public $table = 'adv_clientes';
    protected $fillable = [
        'nome',
        'endereco'
    ];
}

