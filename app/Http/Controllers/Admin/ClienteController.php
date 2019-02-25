<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\VueTables\EloquentVueTables;
use DB;
use Redirect;
class ClienteController extends Controller
{
    public function index()
    {
 
        $clientes = DB::table('users')
        ->join('adv_clientes', 'adv_clientes.id_usuario', '=', 'users.id_usuario')
        ->join('adv_processos', 'adv_processos.id_cliente', '=', 'adv_clientes.id_cliente')
        ->select('users.id_usuario',
        'adv_clientes.id_cliente', 
        'adv_clientes.nome',
        'adv_clientes.tipo', 
        'adv_clientes.data_cad', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria')
        ->orderBy('adv_clientes.id_cliente', 'desc')
        ->get();

        return view('admin.cliente.index', compact('clientes'));
        
    }
    public function lista()
    {
 
        $clientes = DB::table('adv_clientes')
        ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')                
        ->join('adv_processos', 'adv_processos.id_contrato', '=', 'adv_contratos.id_contrato')
        ->select(
        'adv_clientes.id_cliente', 
        'adv_clientes.nome',
        'adv_clientes.tipo',         
        'adv_contratos.data_cadastro', 
        'adv_processos.num_processo', 
        'adv_processos.parte_contraria');

        $view_table = new EloquentVueTables();
        $table_data = $view_table->get($clientes, ['adv_clientes.id_cliente','nome','parte_contraria','num_processo', 'data_cad', 'adv_clientes.tipo']);
        return $table_data;
        
    }    

    // Controllers para Pessoa Física
    public function adicionarf()
    {
        return view('admin.cliente.adicionarf');
    }
    public function adicionarfBanco(Request $request)
    {
        $c = $request;
        $data_nasc = Carbon::createFromFormat('d-m-Y', $request->data_nasc );
        $data_nasc_mae = Carbon::createFromFormat('d-m-Y', $request->data_nasc_mae ); 
        $inserir_clientes = DB::table('adv_clientes')
        ->insertGetId(
            ['id_empresa' => '1', 
            'id_usuario' => '1', 
            'tipo' => 'F', 
            'nome' => $c->input('nome'), 
            'endereco' => $c->input('endereco'), 
            'bairro' => $c->input('bairro'), 
            'cep' => $c->input('cep'), 
            'cidade' => $c->input('cidade'), 
            'estado' => $c->input('estado'), 
            'telefone' => $c->input('telefone'), 
            'celular_recado' => $c->input('celular_recado'), 
            'email' => $c->input('email'), 
            'site' => $c->input('site'), 
            'rg_ie' => $c->input('rg_ie'), 
            'cpf_cnpj' => $c->input('cpf_cnpj'), 
            'ctps' => $c->input('ctps'), 
            'serie' => $c->input('serie'), 
            'data_nasc' => $data_nasc, 
            'data_nasc_mae' => $data_nasc_mae, 
            'sexo' => $c->input('sexo'), 
            'nacionalidade' => $c->input('nacionalidade'), 
            'estado_civil' => $c->input('estado_civil'), 
            'profissao' => $c->input('profissao'), 
            'obs' => $c->input('obs'), 
            'data_cad' => date('Y-m-d H:i:s')]
        );

        
        \Session::flash('mensagem_sucesso', 'Cliente Cadastrado com sucesso!');

        return Redirect::to('admin/cliente/adicionarf');

    }
    public function editarf($id_cliente)
    {
       $cliente = Cliente::findOrFail($id_cliente);
       $cliente->data_nasc = \Carbon\Carbon::parse($cliente->data_nasc)->format('d-m-Y');
       $cliente->data_nasc_mae = \Carbon\Carbon::parse($cliente->data_nasc_mae)->format('d-m-Y');    
       return view('admin.cliente.adicionarf', ['cliente' => $cliente]);
    }
    public function atualizarfBanco($id, Request $request)
    {
        $c = $request;
        $data_nasc = Carbon::createFromFormat('d-m-Y', $request->data_nasc );
        $data_nasc_mae = Carbon::createFromFormat('d-m-Y', $request->data_nasc_mae );         
        $inserir_clientes = DB::table('adv_clientes')
        ->where('id_cliente', $id)
        ->update(
            ['id_empresa' => '1', 
            'id_usuario' => '1',
            'tipo' => 'F', 
            'nome' => $c->input('nome'), 
            'endereco' => $c->input('endereco'), 
            'bairro' => $c->input('bairro'), 
            'cep' => $c->input('cep'), 
            'cidade' => $c->input('cidade'), 
            'estado' => $c->input('estado'), 
            'telefone' => $c->input('telefone'), 
            'celular_recado' => $c->input('celular_recado'), 
            'email' => $c->input('email'), 
            'site' => $c->input('site'), 
            'rg_ie' => $c->input('rg_ie'), 
            'cpf_cnpj' => $c->input('cpf_cnpj'), 
            'ctps' => $c->input('ctps'), 
            'serie' => $c->input('serie'), 
            'data_nasc' => $data_nasc, 
            'data_nasc_mae' => $data_nasc_mae, 
            'sexo' => $c->input('sexo'), 
            'nacionalidade' => $c->input('nacionalidade'), 
            'estado_civil' => $c->input('estado_civil'), 
            'profissao' => $c->input('profissao'), 
            'obs' => $c->input('obs'), 
            'data_cad' => date('Y-m-d H:i:s')]
        );

        
        \Session::flash('mensagem_sucesso', 'Cliente atualizado com sucesso!');

        return Redirect::to('admin/cliente/'.$id.'/editarf');

    }
    public function deletarfBanco($id_cliente)
    {
       $cliente = Cliente::findOrFail($id_cliente);    
       $cliente->delete();
       \Session::flash('mensagem_sucesso', 'Cliente deletado com sucesso!');
       return Redirect::to('admin/cliente');
    }
    
    // Controllers para Pessoa Jurídica

    public function adicionarj()
    {


        return view('admin.cliente.adicionarj');
    }
    public function adicionarjBanco(Request $request)
    {
        $c = $request;
        $data_nasc_mae = Carbon::createFromFormat('d-m-Y', $request->data_nasc_mae );
        $inserir_clientes = DB::table('adv_clientes')
        ->insertGetId(
            ['id_empresa' => '1', 
            'id_usuario' => '1', 
            'tipo' => 'J', 
            'nome' => $c->input('nome'), 
            'endereco' => $c->input('endereco'), 
            'bairro' => $c->input('bairro'), 
            'cep' => $c->input('cep'), 
            'cidade' => $c->input('cidade'), 
            'estado' => $c->input('estado'), 
            'telefone' => $c->input('telefone'), 
            'celular_recado' => $c->input('celular_recado'), 
            'email' => $c->input('email'), 
            'site' => $c->input('site'), 
            'rg_ie' => $c->input('rg_ie'), 
            'cpf_cnpj' => $c->input('cpf_cnpj'), 
            'ctps' => $c->input('ctps'), 
            'serie' => $c->input('serie'), 
            'data_nasc' => $c->input('data_nasc'), 
            'data_nasc_mae' => $data_nasc_mae, 
            'sexo' => $c->input('sexo'), 
            'nacionalidade' => $c->input('nacionalidade'), 
            'estado_civil' => $c->input('estado_civil'), 
            'profissao' => $c->input('profissao'), 
            'obs' => $c->input('obs'), 
            'data_cad' => date('Y-m-d H:i:s')]
        );

        $id = DB::getPdo()->lastInsertId();
        \Session::flash('mensagem_sucesso', 'Cliente Cadastrado com sucesso!');

        return Redirect::to('admin/cliente/'.$id.'/editar');

    }
    public function editarj($id_cliente)
    {
       $cliente = Cliente::findOrFail($id_cliente);
       $cliente->data_nasc_mae = \Carbon\Carbon::parse($cliente->data_nasc_mae)->format('d-m-Y');
       return view('admin.cliente.adicionarj', ['cliente' => $cliente]);
    }
   
    public function atualizarjBanco($id, Request $request)
    {
        $c = $request;
        $data_nasc_mae = Carbon::createFromFormat('d-m-Y', $request->data_nasc_mae );
        $inserir_clientes = DB::table('adv_clientes')
        ->where('id_cliente', $id)
        ->update(
            ['id_empresa' => '1', 
            'id_usuario' => '1',
            'tipo' => 'J', 
            'nome' => $c->input('nome'), 
            'endereco' => $c->input('endereco'), 
            'bairro' => $c->input('bairro'), 
            'cep' => $c->input('cep'), 
            'cidade' => $c->input('cidade'), 
            'estado' => $c->input('estado'), 
            'telefone' => $c->input('telefone'), 
            'celular_recado' => $c->input('celular_recado'), 
            'email' => $c->input('email'), 
            'site' => $c->input('site'), 
            'rg_ie' => $c->input('rg_ie'), 
            'cpf_cnpj' => $c->input('cpf_cnpj'), 
            'ctps' => $c->input('ctps'), 
            'serie' => $c->input('serie'), 
            'data_nasc' => $c->input('data_nasc'), 
            'data_nasc_mae' => $data_nasc_mae, 
            'sexo' => $c->input('sexo'), 
            'nacionalidade' => $c->input('nacionalidade'), 
            'estado_civil' => $c->input('estado_civil'), 
            'profissao' => $c->input('profissao'), 
            'obs' => $c->input('obs'), 
            'data_cad' => date('Y-m-d H:i:s')]
        );

        
        \Session::flash('mensagem_sucesso', 'Cliente atualizado com sucesso!');

        return Redirect::to('admin/cliente/'.$id.'/editarj');

    }
    public function deletarjBanco($id_cliente)
    {
       $cliente = Cliente::findOrFail($id_cliente);    
       $cliente->delete();
       \Session::flash('mensagem_sucesso', 'Cliente deletado com sucesso!');
       return Redirect::to('admin/cliente');
    }

    // Controllers Proprietarios
    public function proprietariosdelete(Request $request)
    {    
        $id_proprietario = $request->id;
        $inserir_clientes = DB::table('adv_proprietarios')
        ->where('adv_proprietarios.id_proprietario', $id_proprietario)
        ->delete();   
        echo "deleted"; 
    }
    public function proprietarios($id_cliente, Request $request)
    {
        if($request->nome){
            $inserir_clientes = DB::table('adv_proprietarios')
            ->insertGetId(
                ['id_cliente' => $request->id_cliente, 
                'id_empresa' => '1',
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'participacao' => $request->participacao,
                'nacionalidade' => $request->nacionalidade,
                'estado_civil' => $request->estado_civil,
                'profissao' => $request->profissao
                ]
            );          
        }
            $proprietarios = DB::table('adv_clientes')
            ->join('adv_proprietarios', 'adv_proprietarios.id_cliente', '=', 'adv_clientes.id_cliente')
            ->select('adv_clientes.id_cliente',
            'adv_proprietarios.id_proprietario',
            'adv_proprietarios.nome',
            'adv_proprietarios.participacao')
            ->where('adv_proprietarios.id_cliente', $id_cliente)
            ->orderBy('adv_clientes.id_cliente', 'desc')
            ->get();    

            if($proprietarios){
                foreach($proprietarios as $key => $p){
                    echo '<tr id="'.$p->id_proprietario.'"> <td>'. $p->id_proprietario.'<td>'.$p->nome.'</td><td>'.$p->participacao.'</td><td><a style="cursor:pointer;" onclick="del('.$p->id_proprietario.')"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
                }
            
            }
        
    }
    public function info($id_cliente, Request $request)
    {
        if($request->nome){
            $inserir_clientes = DB::table('adv_proprietarios')
            ->insertGetId(
                ['id_cliente' => $request->id_cliente, 
                'id_empresa' => '1',
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'rg' => $request->rg,
                'participacao' => $request->participacao,
                'nacionalidade' => $request->nacionalidade,
                'estado_civil' => $request->estado_civil,
                'profissao' => $request->profissao
                ]
            );          
        }
            $info = DB::table('adv_clientes')
            ->join('adv_contratos', 'adv_contratos.id_cliente', '=', 'adv_clientes.id_cliente')            
            ->select('adv_clientes.id_cliente',
            'adv_clientes.nome',
            'adv_clientes.endereco',
            'adv_clientes.bairro',
            'adv_clientes.cep',
            'adv_clientes.cidade',
            'adv_clientes.telefone',
            'adv_clientes.email',
            'adv_clientes.celular_recado',
            'adv_contratos.id_contrato',
            'adv_contratos.tipo'
            )
            ->where('adv_contratos.id_contrato', $id_cliente)
            ->get();    

            if($info){
                foreach($info as $key => $p){
                    echo '
                    
                        <div class="col-md-12"><h4>Contrato</h4></div>
                        <div class="col-md-6">
                        <b>ID Contrato: </b>'.$p->id_contrato.' <br>
                        </div>
                        <div class="col-md-6">
                        <b>Tipo: </b>'.$p->tipo.' <br>
                        </div>                        
                    
                        <div class="col-md-12"><h4>Cliente</h4></div><div class="col-md-6"><b>Email: </b>'.$p->email.' <br><b>Nome: </b>'.$p->nome.' <br><b>Endereço: </b>'.$p->endereco.' <br><b>Bairro: </b>'.$p->bairro.'</div><div class="col-md-6"><b>CEP: '.$p->cep.'</b> <br><b>Cidade:</b> '.$p->cidade.' <br><b>Telefone:</b> '.$p->telefone.' <br><b>Celular/Recado: </b>'.$p->celular_recado.' </div>';
                }
            
            }
        
    }    
        
}


