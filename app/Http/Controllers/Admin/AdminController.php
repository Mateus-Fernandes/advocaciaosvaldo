<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\VueTables\EloquentVueTables;
use DB;
use Redirect;



class AdminController extends Controller
{
    public function index(){
        
        $clientes = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_processos', 'adv_processos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('users.id_usuario',
        'adv_clientes.id_cliente', 
        'adv_clientes.nome',
        'adv_clientes.tipo', 
        'adv_clientes.data_cad', 
        'adv_processos.num_processo',
        'adv_processos.id_processo',  
        'adv_processos.parte_contraria')
        ->orderBy('adv_clientes.id_cliente', 'desc')
        ->limit(10)
        ->get();

        $clientes_num = DB::table('adv_clientes')
        ->get();
        $contratosc_num = DB::table('adv_contratos')
        ->where('tipo', 'C')
        ->get();
        $contratost_num = DB::table('adv_contratos')
        ->where('tipo', 'T')
        ->get();
        $processos_num = DB::table('adv_processos')
        ->get();                
        return view('admin.home.index', compact('clientes', 'clientes_num', 'contratosc_num', 'contratost_num', 'processos_num') );

    }
}
