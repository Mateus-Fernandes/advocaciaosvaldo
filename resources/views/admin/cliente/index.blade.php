@extends('adminlte::page')

@section('title', 'Cliente')

@section('content_header')
    <h1>Clientes</h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Clientes</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem de clientes</h3>
            
        </div>
        <div class="box-body">
            @if(Session::has('mensagem_sucesso'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
            @endif        
            <div class="d-flex justfy-content-end">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>  Adicionar Novo Cliente
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route ('cliente.adicionarf') }}">Adicionar Pessoa Física</a>
                        <a class="dropdown-item" href="{{ route ('cliente.adicionarj') }}">Adicionar Pessoa Jurídica</a>
                    </div>
                </div>                
            </div>
            <ex-clientes url="http://laravel.local:8080/admin/cliente/lista" :columns="columns" :options="options">

            </ex-clientes>
        </div>
        
    </div>
    
@stop