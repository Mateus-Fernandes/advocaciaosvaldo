<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$this->group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){
    $this->get('/', 'AdminController@index')->name('admin.home');

    // Rotas Clientes - Pessoa Física
    $this->get('cliente', 'ClienteController@index')->name('admin.cliente');
    $this->get('cliente/lista', 'ClienteController@lista')->name('cliente.lista');     
    $this->get('cliente/adicionarf', 'ClienteController@adicionarf')->name('cliente.adicionarf');
    $this->get('cliente/{cliente}/editarf', 'ClienteController@editarf')->name('cliente.editarf');
    $this->post('cliente/adicionarf', 'ClienteController@adicionarfBanco')->name('adicionarf.banco');
    $this->patch('cliente/{cliente}/atualizarf', 'ClienteController@atualizarfBanco')->name('atualizarf.banco');
    $this->get('cliente/{cliente}/deletarf', 'ClienteController@deletarfBanco')->name('deletarf.banco');

    // Rotas Clientes - Jurídico
    $this->get('cliente/adicionarj', 'ClienteController@adicionarj')->name('cliente.adicionarj');
    $this->get('cliente/{cliente}/editarj', 'ClienteController@editarj')->name('cliente.editarj');
    $this->post('cliente/adicionarj', 'ClienteController@adicionarjBanco')->name('adicionarj.banco');
    $this->patch('cliente/{cliente}/atualizarj', 'ClienteController@atualizarjBanco')->name('atualizarj.banco');
    $this->get('cliente/{cliente}/deletarj', 'ClienteController@deletarjBanco')->name('deletarj.banco');

    //Rotas Proprietarios
    $this->post('cliente/{cliente}/proprietariosadd', 'ClienteController@proprietarios');
    $this->post('cliente/proprietariosdelete', 'ClienteController@proprietariosdelete');
    $this->get('cliente/{cliente}/proprietarios', 'ClienteController@proprietarios');
    $this->get('cliente/{cliente}/info', 'ClienteController@info');

    // Rotas Contratos Civil
    $this->get('contratoc', 'ContratocController@index')->name('admin.contratoc');
    $this->get('contratoc/lista', 'ContratocController@lista')->name('contratoc.lista');
    $this->get('contratoc/adicionar', 'ContratocController@adicionar')->name('contratoc.adicionar');
    $this->get('contratoc/{contratoc}/editar', 'ContratocController@editar')->name('contrato.editar');
    $this->post('contratoc/adicionar', 'ContratocController@adicionarBanco')->name('adicionar.banco');
    $this->patch('contratoc/{contratoc}/atualizar', 'ContratocController@atualizarBanco')->name('atualizarc.banco');
    $this->patch('contratoc/{contratoc}/atualizardoc', 'ContratocController@atualizardocBanco')->name('atualizardoc.banco');
    $this->get('contratoc/{contratoc}/deletar', 'ContratocController@deletarBanco')->name('deletar.banco');

    // Rotas Contratos Trabalhistas
    $this->get('contratot', 'ContratotController@index')->name('admin.contratot');
    $this->get('contratot/adicionar', 'ContratotController@adicionar')->name('contratot.adicionar');
    $this->get('contratot/lista', 'ContratotController@lista')->name('contratot.lista');
    $this->get('contratot/{contratot}/editar', 'ContratotController@editar')->name('contrato.editar');
    $this->post('contratot/adicionar', 'ContratotController@adicionarBanco')->name('adicionar.banco');
    $this->patch('contratot/{contratot}/atualizar', 'ContratotController@atualizarBanco')->name('atualizart.banco');
    $this->patch('contratot/{contratot}/atualizardoc', 'ContratotController@atualizardocBanco')->name('atualizardoc.banco');
    $this->get('contratot/{contratot}/deletar', 'ContratotController@deletarBanco')->name('deletar.banco');

    // Rotas Processos
    $this->get('processo', 'ProcessoController@index')->name('admin.processo');
    $this->get('processo/lista', 'ProcessoController@lista')->name('processo.lista');    
    $this->get('processo/adicionar', 'ProcessoController@adicionar')->name('processo.adicionar');
    $this->post('processo/adicionar', 'ProcessoController@adicionarBanco')->name('adicionar.banco');
    $this->get('processo/{processo}/editar', 'ProcessoController@editar')->name('processo.editar');
    $this->patch('processo/{processo}/atualizar', 'ProcessoController@atualizarBanco')->name('atualizar.banco');
    $this->get('processo/{processo}/deletar', 'ProcessoController@deletarBanco')->name('deletar.banco');
    $this->patch('processo/{processo}/andamento', 'ProcessoController@andamentoregistro')->name('andamentoregistro.banco');
    $this->patch('processo/{processo}/andamentosalva', 'ProcessoController@andamentosalva')->name('andamentosalva.banco');
    $this->get('processo/{processo}/deletarandamento', 'ProcessoController@deletarandamentoBanco')->name('deletarandamento.banco');
    $this->get('processo/{processo}/pdfprocesso', 'ProcessoController@pdfprocesso')->name('processo.pdf');
            
});


$this->get('/', 'SiteController@index')->name('home');

Auth::routes();

