<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contratot;
use App\Models\Contratoc;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\VueTables\EloquentVueTables;
use App\Http\Controllers\Controller;
use DB;
use Redirect;
class ContratotController extends Controller
{
    public function index()
    {
 
        $contratost = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')         
        ->join('adv_trabalhista', 'adv_trabalhista.id_contrato', '=', 'adv_contratos.id_contrato')        
        ->join('adv_processos', 'adv_processos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('users.id_usuario',
        'adv_clientes.id_cliente', 
        'adv_trabalhista.id_contrato',
        'adv_clientes.nome',
        'adv_contratos.tipo',         
        'adv_contratos.data_cadastro', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria')
        ->where('adv_contratos.tipo', 'T')
        ->orderBy('adv_clientes.id_cliente', 'desc')
        ->get();

        return view('admin.contratot.index', compact('contratost'));
        
    }
    public function lista()
    {
 
        $contratost = DB::table('users')
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
        ->where('adv_contratos.tipo', 'T');

        $view_table = new EloquentVueTables();
        $table_data = $view_table->get($contratost, ['adv_contratos.id_contrato','nome','parte_contraria','num_processo', 'adv_contratos.data_cadastro']);
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

        return view('admin.contratot.adicionar', $items);
    }
    public function adicionarBanco(Request $request)
    {
        $cliente = $request->cliente;
        $idcontrato = DB::table('adv_clientes')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('adv_contratos.id_contrato')     
        ->where('adv_contratos.id_cliente', $cliente)
        ->get();
        Contratot::create(array_merge($request->except(['cliente']), ['id_contrato' => $idcontrato[0]->id_contrato]));
        $id = DB::getPdo()->lastInsertId();
        \Session::flash('mensagem_sucesso', 'Cliente Cadastrado com sucesso!');


        return Redirect::to('admin/contratot/'.$idcontrato[0]->id_contrato.'/editar');

    }
    public function editar($id_contratot)
    {
        $cliente = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')        
        ->join('adv_trabalhista', 'adv_trabalhista.id_contrato', '=', 'adv_contratos.id_contrato')                 
        ->select('users.id_usuario',
        'adv_clientes.id_cliente',
        'adv_clientes.nome',
        'adv_clientes.endereco',
        'adv_clientes.bairro',
        'adv_clientes.cidade',
        'adv_contratos.tipo',
        'adv_trabalhista.id_contrato',                
        'adv_clientes.telefone',
        'adv_clientes.celular_recado',                                                  
        'adv_clientes.nome')
        ->where('adv_trabalhista.id_contrato', $id_contratot)
        ->get();
        
        
        $itemlist = DB::table('adv_clientes')
            ->orderBy('adv_clientes.data_cad', 'desc')
            ->get();       
       $contratot = Contratot::findOrFail($id_contratot);
       $contratoc = Contratoc::findOrFail($id_contratot);    
       return view('admin.contratot.adicionar', ['contratot' => $contratot,'contratoc' => $contratoc, 'itemlist' => $itemlist], compact('cliente'));
    }
    public function atualizarBanco($id, Request $request)
    {

        $contratot = Contratot::findOrFail($id);
        $contratot->update($request->except(['cliente']));
        
        \Session::flash('mensagem_sucesso', 'Contrato atualizado com sucesso!');

        return Redirect::to('admin/contratot/'.$id.'/editar');

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
        if($request->hasFile('entrevista') && $request->file('entrevista')->isValid()){
            if($docs[0]->contrato_empresa){
                $name = $docs[0]->contrato_empresa;
                unlink(storage_path('app/public/contratos/'.$name));
            }
            else
                $name = $id.'_contrato_empresa_'.kebab_case(date('Y-m-d'));
                
            $extensionfile = $request->entrevista->extension();
            $nameFile = "{$name}.{$extensionfile}";

            $docs[0]->contrato_empresa = $nameFile;

            $upload = $request->entrevista->storeAs('contratos', $nameFile);
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
            'contrato' => $docs[0]->contrato,
            'procuracao' => $docs[0]->procuracao,
            'contrato_empresa' => $docs[0]->contrato_empresa,
            ]);

        \Session::flash('mensagem_sucesso2', 'Documentos atualizados com sucesso!');
        return Redirect::to('admin/contratot/'.$id.'/editar');

    }    
    public function deletarBanco($id_contrato)
    {
       $contratot = Contratot::findOrFail($id_contrato);    
       $contratot->delete();
       \Session::flash('mensagem_sucesso', 'Contrato deletado com sucesso!');
       return Redirect::to('admin/contratot');
    }    
        
    
        
}


