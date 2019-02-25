@extends('adminlte::page')


@if(Request::is('*/editar'))
                @section('title', 'Editar Contrato Cível')
            @else
                @section('title', 'Novo Contrato Cível')
            @endif
@section('content_header')
    <h1>
            @if(Request::is('*/editar'))
                {{'Editar Contrato Cível - '.$contratoc->id_cliente}}
            @else
                {{'Adicionar Contrato Cível'}}
            @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Contrato Cível</a></li>
        <li><a href="">
            @if(Request::is('*/editar'))
                {{'Editar Contrato Cível - '.$contratoc->nome}}
            @else
                {{'Adicionar Contrato Cível'}}
            @endif
        </a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        @if(Request::is('*/editar'))
        <div class="col-md-8">
        @else
        <div class="col-md-12">
        @endif
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                @if(Request::is('*/editar'))
                    {{'Editar Contrato Cível - '.$contratoc->id_cliente}}
                @else
                    {{'Adicionar Contrato Cível'}}
                @endif
                </h3>
                
            </div>
            <div class="box-body">
                @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
                @if(Request::is('*/editar'))
                    {!! Form::model($contratoc, ['method'=> 'PATCH', 'url' => 'admin/contratoc/'.$contratoc->id_contrato.'/atualizar']) !!}
                @else
                    {!! Form::open(['url' => 'admin/contratoc/adicionar', 'id'=>'formId']) !!}
                @endif                
                
                    <div class="row">                 
                            <div class="form-group col-md-10">
                                {!! Form::label('cliente', 'Selecione o Cliente:') !!}
                                <select name="cliente" id="cliente" class="form-control select2">
                                @if(Request::is('*/editar'))
                                <option value="{{$cliente[0]->id_cliente}}">{{$cliente[0]->nome}}</option>
                                @else
                                @endif
                                @foreach($itemlist as $item)
                                    <option value="null">Selecione o cliente...</option>
                                    <option value="{{ $item->id_cliente }}">{{ $item->nome }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                            <div class="col-md-10">
                                <div class="form-group">
                                {!! Form::label('tipo', 'Tipo:') !!}
                                {!! Form::select('tipo', 
                                    [
                                    'C' => 'Cível', 
                                    'I' => 'Imobiliária', 
                                    'F' => 'Familia e Sucessões',
                                    'M' => 'Mercado de Capitais', 
                                    'A' => 'Administrativo', 
                                    'COM' => 'Comercial', 
                                    'P' => 'Previdenciário', 
                                    'CON' => 'Consumidor', 
                                    'T' => 'Trabalhista', 
                                    'TRI' => 'Tributário',
                                    'AM' => 'Ambiental'                             
                                    ],null,['class'=> 'form-control select2']); !!} 
                                </div>
                            </div>                                                             
                    </div>
                    <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                {!! Form::label('forma_pagto', 'Forma de Pagamento:') !!}
                                {!! Form::select('forma_pagto', 
                                    [                             
                                    'A' => 'Honorário Inicial', 
                                    'B' => 'Honorário Final', 
                                    'C' => 'Honorário Inicial + Final',
                                    'D' => 'Honorário Mensal', 
                                    'E' => 'Sem Cobrança de Honorários'                          
                                    ],null,['class'=> 'form-control select2', 'id'=>'selectforma']); !!}                                                  
                                </div>
                            </div>                    
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('honorinicial_val', 'Valor Honorário Inicial:') !!}

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    {!! Form::input('text', 'honorinicial_val', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor Honorário Inicial:', 'id'=>'honorinicial_val']) !!}                                   
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('honorinicial_data', 'Data do Pagamento:') !!}

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::input('text', 'honorinicial_data', null, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "dd-mm-yyyy"', 'data-mask'=>'', 'id'=>'honorinicial_data']) !!}   
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    {!! Form::label('honorfinal_porc', ' Porcentagem de  Honorário Final:') !!}
                                    {!! Form::input('text', 'honorfinal_porc', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Porcentagem de  Honorário Final', 'id'=>'honorfinal_porc']) !!}                                
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                    {!! Form::label('honormensal_val', 'Valor da Parcela do  Honorário Mensal:') !!}
                                    {!! Form::input('text', 'honormensal_val', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor da Parcela do  Honorário Mensal:', 'id'=>'honormensal_val']) !!}                                   
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    {!! Form::label('honormensal_parc', 'Número de Parcelas:') !!}
                                    {!! Form::input('text', 'honormensal_parc', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Número de Parcelas:', 'id'=>'honormensal_parc']) !!}                          
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    {!! Form::label('honormensal_data', 'Data do 1º Pagamento:') !!}
                                    {!! Form::input('text', 'honormensal_data', null, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "dd-mm-yyyy"', 'data-mask'=>'', 'id'=>'honormensal_data']) !!}                          
                                <!-- /.input group -->
                            </div>
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('historico', 'Observações:') !!}
                            {!! Form::textarea('historico', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Insira aqui as observações:', 'rows'=>'6', 'cols'=>'30']) !!}  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <div class="center-block text-center" style="margin-top:30px;">
                            
                            @if(Request::is('*/editar'))
                                {!! Form::submit('Atualizar Contrato',['class'=>'btn btn-success btn-lg']) !!}
                            @else
                                {!! Form::submit('Cadastrar Contrato',['class'=>'btn btn-success btn-lg']) !!}
                            @endif                        
                        </div>
                        </div>
                    </div>


                {!! Form::close() !!}
            </div>
            
        </div>
        @if(Request::is('*/editar'))
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Informações do Cliente</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <b>Nome:</b> {{$cliente[0]->nome}} <br>
                            <b>Endereço:</b> {{$cliente[0]->endereco}} <br>
                            <b>Bairro:</b> {{$cliente[0]->bairro}} <br>
                            <b>Cidade:</b> {{$cliente[0]->cidade}} <br>
                        </div>
                        <div class="col-md-6">
                            <b>Tipo de Pessoa:</b> {{$cliente[0]->tipo}} <br>
                            <b>Telefone:</b> {{$cliente[0]->telefone}} <br>
                            <b>Celular / Recado:</b> {{$cliente[0]->celular_recado}} <br>
                        </div>                        
                    </div>              
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Anexar documentos</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                        @if(Session::has('mensagem_sucesso2'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso2')}}</div>
                        @endif                            
                            {!! Form::model($contratoc, ['method'=> 'PATCH', 'url' => 'admin/contratoc/'.$contratoc->id_contrato.'/atualizardoc','files' => true, 'class'=>'uploader']) !!}
                            {!! Form::label('contrato_c', 'Anexar contrato Mensalista:') !!}   
                            @if ($contratoc->contrato_c != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_c)}}">{{$contratoc->contrato_c}}</a></div>
                            @endif                             
                            <div class="uploadert contrato_c">


                                {!! Form::file('contrato_c',['id'=>'file-upload']) !!}
                                
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>
                            <br>
                            {!! Form::label('contrato', 'Anexar contrato:') !!}
                            @if ($contratoc->contrato != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_c)}}">{{$contratoc->contrato_c}}</a></div>
                            @endif                                    
                            <div class="uploadert contrato">
                                {!! Form::file('contrato',['id'=>'file-upload2']) !!}
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>
                            <br>
                            {!! Form::label('procuracao', 'Anexar Procuração:') !!}
                            @if ($contratoc->procuracao != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_c)}}">{{$contratoc->contrato_c}}</a></div>
                            @endif                                    
                            <div class="uploadert procuracao">
                                {!! Form::file('procuracao',['id'=>'file-upload3']) !!}
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>                                                              
                            {!! Form::submit('Atualizar Documentos',['class'=>'btn btn-primary', 'style'=>'margin-top:30px;']) !!}
                            {!! Form::close() !!}
                        </div>                      
                    </div>              
                </div>
            </div>                                                 
        </div>
        @else
        
        @endif        
    </div>
@stop