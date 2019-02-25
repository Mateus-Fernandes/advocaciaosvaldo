@extends('adminlte::page')

@section('title', 'Contrato Trabalhista')

@section('content_header')
    <h1>Contrato Trabalhista</h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Contrato Trabalhista</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem -  Contrato Trabalhista</h3>
            
        </div>
        <div class="box-body">
            @if(Session::has('mensagem_sucesso'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
            @endif        
            <div class="d-flex justfy-content-end">
                <div class="dropdown">
                    <a href="{{ route ('contratot.adicionar') }}"><button class="btn btn-success" type="button">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>  Adicionar Novo Contrato Trabalhista
                    </button></a>
                </div>                
            </div>
            <contratos-t></contratos-t>
        </div>
        
    </div>
    
@stop