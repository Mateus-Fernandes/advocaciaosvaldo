<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contratoc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Processo;
use Carbon\Carbon;
use App\VueTables\EloquentVueTables;
use DB;
use Redirect;
class ContratocController extends Controller
{
    public function index()
    {
 
        $contratosc = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')        
        ->join('adv_processos', 'adv_processos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('users.id_usuario',
        'adv_clientes.id_cliente', 
        'adv_contratos.id_contrato',
        'adv_clientes.nome',
        'adv_contratos.tipo', 
        'adv_contratos.data_cadastro', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria')
        ->where('adv_contratos.tipo', 'C')
        ->orderBy('adv_clientes.id_cliente', 'desc')
        ->get();

        return view('admin.contratoc.index', compact('contratosc'));
        
    }
    public function lista()
    {
 
        $contratosc = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')        
        ->join('adv_processos', 'adv_processos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('users.id_usuario',
        'adv_clientes.id_cliente', 
        'adv_contratos.id_contrato',
        'adv_clientes.nome',
        'adv_contratos.tipo', 
        'adv_contratos.data_cadastro', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria')
        ->where('adv_contratos.tipo', 'C');

        $view_table = new EloquentVueTables();
        $table_data = $view_table->get($contratosc, ['adv_contratos.id_contrato','nome','parte_contraria','num_processo', 'adv_contratos.data_cadastro']);
        return $table_data;  
        
    }    
    // Controllers para Pessoa Física
    public function adicionar()
    {
        $items = array(
            'itemlist' =>  DB::table('adv_clientes')
            ->orderBy('adv_clientes.data_cad', 'desc')
            ->get()
          );

        return view('admin.contratoc.adicionar', $items);
    }
    public function adicionarBanco(Request $request)
    {
        $c = $request;
        $honorinicial_data = Carbon::createFromFormat('d-m-Y', $request->honorinicial_data );
        $honormensal_data = Carbon::createFromFormat('d-m-Y', $request->honormensal_data );
        $inserir_clientes = DB::table('adv_contratos')
        ->insertGetId(
            ['id_empresa' => '1', 
            'id_usuario' => '1',
            'id_cliente' => $c->input('cliente'), 
            'tipo' => $c->input('tipo'), 
            'forma_pagto' => $c->input('forma_pagto'),
            'honorinicial_val' => $c->input('honorinicial_val'), 
            'honorinicial_data' => $honorinicial_data, 
            'honorfinal_porc' => $c->input('honorfinal_porc'), 
            'honormensal_val' => $c->input('honormensal_val'), 
            'honormensal_parc' => $c->input('honormensal_parc'), 
            'honormensal_data' => $honormensal_data,                                      
            'historico' => $c->input('historico'),
            'data_cadastro' => date('Y-m-d H:i:s')]
        );

        $id = DB::getPdo()->lastInsertId();;
        \Session::flash('mensagem_sucesso', 'Cliente Cadastrado com sucesso!');


        return Redirect::to('admin/contratoc/'.$id.'/editar');

    }
    public function editar($id_contratoc)
    {
        $cliente = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')       
        ->select('users.id_usuario',
        'adv_clientes.id_cliente',
        'adv_clientes.nome',
        'adv_clientes.endereco',
        'adv_clientes.bairro',
        'adv_clientes.cidade',
        'adv_clientes.telefone',
        'adv_clientes.celular_recado',
        'adv_clientes.tipo',                                                   
        'adv_contratos.id_contrato',
        'adv_clientes.nome')
        ->where('adv_contratos.id_contrato', $id_contratoc)
        ->get();
        
        $itemlist = DB::table('adv_clientes')
            ->orderBy('adv_clientes.data_cad', 'desc')
            ->get();       
       $contratoc = Contratoc::findOrFail($id_contratoc);
       $contratoc->honorinicial_data = \Carbon\Carbon::parse($contratoc->honorinicial_data)->format('d-m-Y');
       $contratoc->honormensal_data = \Carbon\Carbon::parse($contratoc->honormensal_data)->format('d-m-Y');
           
       return view('admin.contratoc.adicionar', ['contratoc' => $contratoc, 'itemlist' => $itemlist], compact('cliente'));
    }
    public function atualizarBanco($id, Request $request)
    {
        $c = $request;
        $honorinicial_data = Carbon::createFromFormat('d-m-Y', $request->honorinicial_data );
        $honormensal_data = Carbon::createFromFormat('d-m-Y', $request->honormensal_data );        
        $inserir_contratocs = DB::table('adv_contratos')
        ->where('id_contrato', $id)
        ->update(
            ['id_empresa' => '1', 
            'id_usuario' => '1',
            'id_cliente' => $c->input('cliente'), 
            'tipo' => $c->input('tipo'), 
            'forma_pagto' => $c->input('forma_pagto'),
            'honorinicial_val' => $c->input('honorinicial_val'), 
            'honorinicial_data' => $honorinicial_data, 
            'honorfinal_porc' => $c->input('honorfinal_porc'), 
            'honormensal_val' => $c->input('honormensal_val'), 
            'honormensal_parc' => $c->input('honormensal_parc'), 
            'honormensal_data' => $honormensal_data,                                      
            'historico' => $c->input('historico'),
            'data_cadastro' => date('Y-m-d H:i:s')]
        );

        
        \Session::flash('mensagem_sucesso', 'Contrato atualizado com sucesso!');

        return Redirect::to('admin/contratoc/'.$id.'/editar');

    }
    public function atualizardocBanco($id, Request $request)
    {
        $c = $request;
        $data = $request->all();
        
        $docs = DB::table('adv_contratos')     
        ->where('adv_contratos.id_contrato', $id)
        ->get();

        if($request->hasFile('contrato_c') && $request->file('contrato_c')->isValid()){
            if($docs[0]->contrato_c){
                $name = $docs[0]->contrato_c;
                unlink(storage_path('app/public/contratos/'.$name));
            }
            else
                $name = $id.'_contrato_c_'.kebab_case(date('Y-m-d'));
                
            $extensionfile = $request->contrato_c->extension();
            $nameFile = "{$name}.{$extensionfile}";

            $docs[0]->contrato_c = $nameFile;

            $upload = $request->contrato_c->storeAs('contratos', $nameFile);
            if(!$upload){
                return redirect()
                ->back()
                ->with('error', 'Falha ao fazer o upload');
            }
            
        }
        if($request->hasFile('contrato') && $request->file('contrato')->isValid()){
            if($docs[0]->contrato)
                $name = $docs[0]->contrato;
            else
                $name = $id.'_contrato_'.kebab_case(date('Y-m-d'));
                
            $extensionfile = $request->contrato->extension();
            $nameFile = "{$name}.{$extensionfile}";

            $docs[0]->contrato = $nameFile;

            $upload = $request->contrato->storeAs('contratos', $nameFile);
            if(!$upload){
                return redirect()
                ->back()
                ->with('error', 'Falha ao fazer o upload');
            }
            
        }
        if($request->hasFile('procuracao') && $request->file('procuracao')->isValid()){
            if($docs[0]->procuracao)
                $name = $docs[0]->procuracao;
            else
                $name = $id.'_procuracao_'.kebab_case(date('Y-m-d'));
                
            $extensionfile = $request->procuracao->extension();
            $nameFile = "{$name}.{$extensionfile}";

            $docs[0]->procuracao = $nameFile;

            $upload = $request->procuracao->storeAs('contratos', $nameFile);
            if(!$upload){
                return redirect()
                ->back()
                ->with('error', 'Falha ao fazer o upload');
            }
            
        }        
        $inserir_contratocs = DB::table('adv_contratos')
        ->where('id_contrato', $id)
        ->update(
            ['id_empresa' => '1',
            'contrato_c' => $docs[0]->contrato_c,
            ]);

        \Session::flash('mensagem_sucesso2', 'Documentos atualizados com sucesso!');
        return Redirect::to('admin/contratoc/'.$id.'/editar');

    }    
    public function deletarBanco($id_contrato)
    {
       $contratoc = Contratoc::findOrFail($id_contrato);    
       $contratoc->delete();
       \Session::flash('mensagem_sucesso', 'Contrato deletado com sucesso!');
       return Redirect::to('admin/contratoc');
    }    
        
    
        
}


