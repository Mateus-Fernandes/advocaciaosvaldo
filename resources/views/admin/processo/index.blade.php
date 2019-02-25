@extends('adminlte::page')

@section('title', 'Processos')

@section('content_header')
    <h1>Processos</h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Processos</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem - Processos</h3>
            
        </div>
        <div class="box-body">
            @if(Session::has('mensagem_sucesso'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
            @endif        
            <div class="d-flex justfy-content-end">
                <div class="dropdown">
                    <a href="{{ route ('processo.adicionar') }}"><button class="btn btn-success" type="button">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>  Adicionar Novo Processo
                    </button></a>
                </div>                
            </div>
            
            
            <processo-v>

            </processo-v>
            

        </div>
        
    </div>
    
@stop