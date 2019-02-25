<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contratot;
use App\Models\Contratoc;
use App\Models\Processo;
use Carbon\Carbon;
use App\VueTables\EloquentVueTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use DB;
use Redirect;
class ProcessoController extends Controller
{
    public function index()
    {
 
        $processos = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')                
        ->join('adv_processos', 'adv_processos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select(
        'adv_processos.id_processo', 
        'adv_clientes.nome',
        'adv_contratos.tipo',         
        'adv_contratos.data_cadastro', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria')
        ->orderBy('adv_clientes.id_cliente', 'desc')
        ->get();

        return view('admin.processo.index', compact('processos'));
        
    }
    public function lista()
    {
 
        $processos = DB::table('adv_clientes')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')                
        ->join('adv_processos', 'adv_processos.id_contrato', '=', 'adv_contratos.id_contrato')
        ->select(
        'adv_processos.id_processo', 
        'adv_clientes.nome',
        'adv_contratos.tipo',         
        'adv_contratos.data_cadastro', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria');
        
        
        $view_table = new EloquentVueTables();
        $table_data = $view_table->get($processos, ['id_processo','nome','parte_contraria','num_processo', 'data_cadastro']);
        return $table_data;        
        
    }    
    
    public function adicionar()
    {
        $items = array(
            'itemlist' =>  DB::table('adv_clientes')
            ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente') 
            ->select('adv_clientes.id_cliente','adv_clientes.nome','adv_contratos.tipo', 'adv_contratos.id_contrato')             
            ->orderBy('adv_clientes.data_cad', 'desc')
            ->get()
          );

        

        return view('admin.processo.adicionar', $items);
    }
    public function adicionarBanco(Request $request)
    {
        $cliente = $request->cliente;
        $id_cliente = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('adv_clientes.id_cliente') 
        ->where('adv_contratos.id_contrato',$cliente )
        ->get();        
        
        Processo::create(array_merge($request->except(['cliente']), ['id_contrato' => $cliente], ['id_cliente' => $id_cliente[0]->id_cliente]));
        $id = DB::getPdo()->lastInsertId();
        \Session::flash('mensagem_sucesso', 'Processo Cadastrado com sucesso!');


        return Redirect::to('admin/processo/'.$id.'/editar');

    }
    public function editar($id_processo)
    {
        $cliente = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')        
        ->join('adv_processos', 'adv_processos.id_contrato', '=', 'adv_contratos.id_contrato')                 
        ->select('users.id_usuario',
        'adv_clientes.id_cliente',
        'adv_clientes.nome',
        'adv_clientes.endereco',
        'adv_clientes.bairro',
        'adv_clientes.cidade',
        'adv_clientes.email',
        'adv_contratos.tipo',
        'adv_contratos.id_contrato',                
        'adv_clientes.telefone',
        'adv_clientes.celular_recado',
        'adv_processos.id_processo',                                                  
        'adv_clientes.nome')
        ->where('adv_processos.id_processo', $id_processo)
        ->get();
        $items = array(
            'itemlist' =>  DB::table('adv_clientes')

          );
          
        
        
        
        $itemlist = DB::table('adv_clientes')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente') 
        ->select('adv_clientes.id_cliente','adv_clientes.nome','adv_contratos.tipo', 'adv_contratos.id_contrato')             
        ->orderBy('adv_clientes.data_cad', 'desc')
        ->get();
        
        $processo_andamento = DB::table('adv_processos_andamento')
        ->select('adv_processos_andamento.id_andamento','adv_processos_andamento.id_processo', 'adv_processos_andamento.datahora', 'adv_processos_andamento.andamento', 'adv_processos_andamento.doc')
        ->orderBy('adv_processos_andamento.id_andamento', 'desc')
        ->where('adv_processos_andamento.id_processo', $id_processo)
        ->get(); 

       $processo = Processo::findOrFail($id_processo);       

       return view('admin.processo.adicionar', ['itemlist' => $itemlist, 'processo'=>$processo, 'processo_andamento'=>$processo_andamento], compact('cliente'));
    }
    public function atualizarBanco($id, Request $request)
    {

        $processo = Processo::findOrFail($id);
        $processo->update($request->except(['cliente']));
        
        \Session::flash('mensagem_sucesso', 'Processo atualizado com sucesso!');

        return Redirect::to('admin/processo/'.$id.'/editar');

    }
    public function andamentoregistro($id, Request $request)
    {
        $c = $request;
        $data = $request->all();
              
        if($request->hasFile('doc') && $request->file('doc')->isValid()){

            $name = $id.'_documentosprocesso_'.kebab_case(date('Y-m-d'));
                
            $extensionfile = $request->doc->extension();
            $nameFile = "{$name}.{$extensionfile}";

            $doc = $nameFile;

            $upload = $request->doc->storeAs('processos', $nameFile);
            if(!$upload){
                return redirect()
                ->back()
                ->with('error', 'Falha ao fazer o upload');
            }
            
        }else{
            $doc = null;
        } 
        $datahora = Carbon::createFromFormat('d/m/Y H:i', $request->datahora );       
        $insere_andamento = DB::table('adv_processos_andamento')
        ->insertGetId(
            ['id_processo' => $id, 
            'id_empresa' => '1',
            'datahora' => $datahora,
            'andamento' => $request->andamento,
            'doc' => $doc,
            ]
        ); 

        \Session::flash('mensagem_sucesso2', 'Andamento registrado com sucesso!');
        return Redirect::to('admin/processo/'.$id.'/editar');

    }

    public function andamentosalva($id, Request $request)
    {
        $c = $request;
        $data = $request->all();
        
        $docs = DB::table('adv_processos_andamento')     
        ->where('adv_processos_andamento.id_andamento', $id)
        ->get();
       
        if($request->hasFile('doc') && $request->file('doc')->isValid()){
            if($docs[0]->doc){
                $name = $docs[0]->doc;
                unlink(storage_path('app/public/processos/'.$name));
            }
            else
                $name = $id.'_documentosprocesso_'.kebab_case(date('Y-m-d'));
                
            $extensionfile = $request->doc->extension();
            $nameFile = "{$name}.{$extensionfile}";

            $docs[0]->doc = $nameFile;

            $upload = $request->doc->storeAs('processos', $nameFile);
            if(!$upload){
                return redirect()
                ->back()
                ->with('error', 'Falha ao fazer o upload');
            }
            
        }
        $datahora = Carbon::createFromFormat('d/m/Y');            
        $inserir_contratocs = DB::table('adv_processos_andamento')
        ->where('id_andamento', $id)
        ->update(
            ['id_empresa' => '1',
            'datahora' => $datahora,
            'andamento' => $request->andamento,
            'doc' => $docs[0]->doc
            ]);

        \Session::flash('mensagem_sucesso2', 'Andamento atualizado com sucesso!');
        return Redirect::to('admin/processo/'.$docs[0]->id_processo.'/editar');

    }    
    public function deletarandamentoBanco($id_andamento)
    {

        $docs = DB::table('adv_processos_andamento')     
        ->where('adv_processos_andamento.id_andamento', $id_andamento)
        ->delete();
       \Session::flash('mensagem_sucesso', 'Andamento deletado com sucesso!');
       return redirect()->back();
    }    
    public function deletarBanco($id_processo)
    {
       $processo = Processo::findOrFail($id_processo);    
       $processo->delete();
       \Session::flash('mensagem_sucesso', 'Contrato deletado com sucesso!');
       return Redirect::to('admin/processo');
    }

    public function pdfprocesso($id_processo)
    {
        $processo = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')        
        ->join('adv_processos', 'adv_processos.id_contrato', '=', 'adv_contratos.id_contrato')                 
        ->select('users.id_usuario',
        'adv_clientes.id_cliente',
        'adv_clientes.nome',
        'adv_clientes.endereco',
        'adv_clientes.bairro',
        'adv_clientes.cidade',
        'adv_clientes.email',
        'adv_contratos.tipo',
        'adv_contratos.id_contrato',                
        'adv_clientes.telefone',
        'adv_clientes.celular_recado',
        'adv_processos.id_processo',
        'adv_processos.num_processo',
        'adv_processos.natureza',
        'adv_processos.vara',
        'adv_processos.pasta',
        'adv_processos.parte_contraria',
        'adv_processos.pc_email',
        'adv_processos.pc_telefone',
        'adv_processos.obs',                                                  
        'adv_clientes.nome')
        ->where('adv_processos.id_processo', $id_processo)
        ->get();
         
        $processo_andamento = DB::table('adv_processos_andamento')
        ->select('adv_processos_andamento.id_andamento','adv_processos_andamento.id_processo', 'adv_processos_andamento.datahora', 'adv_processos_andamento.andamento', 'adv_processos_andamento.doc')
        ->orderBy('adv_processos_andamento.id_andamento', 'desc')
        ->where('adv_processos_andamento.id_processo', $id_processo)
        ->get(); 

              

       //return view('admin.processo.pdf', ['processo'=>$processo, 'processo_andamento'=>$processo_andamento]);
       $pdf = PDF::loadView('admin.processo.pdf', compact('processo', 'processo_andamento'));
       return $pdf->download('relatorio_'.$processo[0]->nome.'_id'.$processo[0]->id_processo.'.pdf');
       return redirect()->back();

    }        
    
        
}


