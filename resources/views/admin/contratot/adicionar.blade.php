@extends('adminlte::page')


@if(Request::is('*/editar'))
                @section('title', 'Editar Contrato Trabalhista')
            @else
                @section('title', 'Novo Contrato Trabalhista')
            @endif
@section('content_header')
    <h1>
            @if(Request::is('*/editar'))
                {{'Editar Contrato Trabalhista - '.$contratot->id_contrato}}
            @else
                {{'Adicionar Contrato Trabalhista'}}
            @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Contrato Trabalhista</a></li>
        <li><a href="">
            @if(Request::is('*/editar'))
                {{'Editar Contrato Trabalhista - '.$contratot->id_contrato}}
            @else
                {{'Adicionar Contrato Trabalhista'}}
            @endif
        </a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        @if(Request::is('*/editar'))
        <div class="col-md-8">
        @else
        <div class="col-md-8">
        @endif
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                @if(Request::is('*/editar'))
                    {{'Editar Contrato Trabalhista - '.$contratot->id_contrato}}
                @else
                    {{'Adicionar Contrato Trabalhista'}}
                @endif
                </h3>
                
            </div>
            <div class="box-body">
                @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
                @if(Request::is('*/editar'))
                    {!! Form::model($contratot, ['method'=> 'PATCH', 'url' => 'admin/contratot/'.$contratot->id_contrato.'/atualizar']) !!}
                @else
                    {!! Form::open(['url' => 'admin/contratot/adicionar', 'id'=>'formId']) !!}
                @endif                
                
                    <div class="row">                 
                            <div class="form-group col-md-12">
                                {!! Form::label('cliente', 'Selecione o Cliente:') !!}
                                <select name="cliente" id="cliente" class="form-control select2">
                                @if(Request::is('*/editar'))
                                <option value="{{$cliente[0]->id_cliente}}">{{$cliente[0]->nome}}</option>
                                @else
                                <option value="null">Selecione o cliente...</option>
                                @endif
                                @foreach($itemlist as $item)
                                    
                                    <option value="{{ $item->id_cliente }}">{{ $item->nome }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <h2>Entrevista Trabalhista</h2>
                    <div class="row">                 
                            <div class="form-group col-md-12">
                                {!! Form::label('empresa', 'Nome da Empresa:') !!}
                                {!! Form::input('text', 'empresa', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Nome da Empresa']) !!}
                        </div>
                    </div>
                    
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                {!! Form::label('emp_endereco', 'Endereço:') !!}
                                {!! Form::input('text', 'emp_endereco', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Endereço']) !!}
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-group">
                                {!! Form::label('emp_bairro', 'Bairro:') !!}
                                {!! Form::input('text', 'emp_bairro', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Bairro']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                {!! Form::label('emp_cep', 'CEP:') !!}
                                {!! Form::input('text', 'emp_cep', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'CEP']) !!}
                                </div>
                            </div>
                                                                
                    </div>
                    <div class="row">
                        
                            <div class="col-md-4">
                                <div class="form-group">
                                {!! Form::label('emp_cidade', 'Cidade:') !!}
                                {!! Form::select('emp_cidade', 
                                [
                                'São Paulo' => 'São Paulo', 
                                'Atibaia' => 'Atibaia',
                                'Avare' => 'Avare', 
                                'Barra Mansa' => 'Barra Mansa', 
                                'Barueri' => 'Barueri', 
                                'Bom Jesus dos Perdões' => 'Bom Jesus dos Perdões', 
                                'Cajamar' => 'Cajamar', 
                                'Canhotinho' => 'Canhotinho', 
                                'Carapicuiba' => 'Carapicuiba',
                                'Ceará' => 'Ceará',
                                'Diadema' => 'Diadema', 
                                'Dracena' => 'Dracena', 
                                'Fco Badaró' => 'Fco Badaró', 
                                'Francisco Morato' => 'Francisco Morato',
                                'Franco da Rocha' => 'Franco da Rocha', 
                                'Guaianazes' => 'Guaianazes', 
                                'Guaratinguetá' => 'Guaratinguetá', 
                                'Guarulhos' => 'Guarulhos', 
                                'Itaquaquecetuba' => 'Itaquaquecetuba', 
                                'Jacareí' => 'Jacareí',
                                'Jandira' => 'Jandira',
                                'Jundiai' => 'Jundiai', 
                                'Juquitiba' => 'Juquitiba', 
                                'Maua' => 'Maua', 
                                'Minas Gerais' => 'Minas Gerais',
                                'Mogi das Cruzes' => 'Mogi das Cruzes', 
                                'Mongaguá' => 'Mongaguá', 
                                'Osasco' => 'Osasco', 
                                'Petrolina' => 'Petrolina', 
                                'Pirapora do Bom Jesus' => 'Pirapora do Bom Jesus', 
                                'Poá' => 'Poá',
                                'Ponta Porã' => 'Ponta Porã',
                                'Ribeirão Preto' => 'Ribeirão Preto', 
                                'Rio de Janeiro' => 'Rio de Janeiro', 
                                'Rio Grande da Serra' => 'Rio Grande da Serra', 
                                'Santana do Parnaíba' => 'Santana do Parnaíba',
                                'Santo André' => 'Santo André', 
                                'Santos' => 'Santos', 
                                'São Bernardo do Campo' => 'São Bernardo do Campo', 
                                'São Caetano do Sul' => 'São Caetano do Sul', 
                                'São José dos Campos' => 'São José dos Campos', 
                                'Sorocaba' => 'Sorocaba',
                                'Sumaré' => 'Sumaré',
                                'Taboão da Serra' => 'Taboão da Serra', 
                                'Rio de Janeiro' => 'Rio de Janeiro', 
                                'Taubaté' => 'Taubaté', 
                                'Vitória da Cosquista' => 'Vitória da Cosquista',
                                '0' => 'Outra'                                
                                ],null,['class'=> 'form-control select2']); !!}                                                     
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('emp_estado', 'Estado:') !!}
                                    {!! Form::select('emp_estado', 
                                    [
                                    'SP' => 'SP', 
                                    'AC' => 'AC', 
                                    'AL' => 'AL',
                                    'AM' => 'AM', 
                                    'AP' => 'AP', 
                                    'BA' => 'BA', 
                                    'CE' => 'CE', 
                                    'DF' => 'DF', 
                                    'ES' => 'ES', 
                                    'GO' => 'GO',
                                    'MA' => 'MA',
                                    'MG' => 'MG', 
                                    'MS' => 'MS', 
                                    'MT' => 'MT', 
                                    'PA' => 'PA',
                                    'PB' => 'PB', 
                                    'PE' => 'PE', 
                                    'PR' => 'PR', 
                                    'PI' => 'PI', 
                                    'RJ' => 'RJ', 
                                    'RN' => 'RN',
                                    'RO' => 'RO',                                
                                    'RR' => 'RR',
                                    'RS' => 'RS', 
                                    'SC' => 'SC', 
                                    'SE' => 'SE', 
                                    'TO' => 'TO'                               
                                    ],null,['class'=> 'form-control select2']); !!}  
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                {!! Form::label('emp_cnpj', 'CNPJ:') !!}
                                {!! Form::input('text', 'emp_cnpj', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'CNPJ']) !!}
                                </div>
                            </div>                            
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                        {!! Form::label('emp_servico', 'Existe empresa tomadora de Serviços?') !!}
                        {!! Form::select('emp_servico', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim',                            
                                    ],null,['class'=> 'form-control select2', 'id'=>'emp_servico']); !!}             
                        </div>
                        </div>
                    </div>
                    <div class="row" id="tomadorasim" style="display:none; margin-top:10px;">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="row">                 
                                <div class="form-group col-md-12">
                                    {!! Form::label('emp_serv_nome', 'Nome da Empresa:') !!}
                                    {!! Form::input('text', 'emp_serv_nome', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Nome da Empresa']) !!}
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        {!! Form::label('emp_serv_end', 'Endereço:') !!}
                                        {!! Form::input('text', 'emp_serv_end', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Endereço']) !!}
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        {!! Form::label('emp_serv_bairro', 'Bairro:') !!}
                                        {!! Form::input('text', 'emp_serv_bairro', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Bairro']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        {!! Form::label('emp_serv_cep', 'CEP:') !!}
                                        {!! Form::input('text', 'emp_serv_cep', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'CEP']) !!}
                                        </div>
                                    </div>
                                                                        
                            </div>
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        {!! Form::label('emp_serv_cidade', 'Cidade:') !!}
                                        {!! Form::select('emp_serv_cidade', 
                                        [
                                        'São Paulo' => 'São Paulo', 
                                        'Atibaia' => 'Atibaia',
                                        'Avare' => 'Avare', 
                                        'Barra Mansa' => 'Barra Mansa', 
                                        'Barueri' => 'Barueri', 
                                        'Bom Jesus dos Perdões' => 'Bom Jesus dos Perdões', 
                                        'Cajamar' => 'Cajamar', 
                                        'Canhotinho' => 'Canhotinho', 
                                        'Carapicuiba' => 'Carapicuiba',
                                        'Ceará' => 'Ceará',
                                        'Diadema' => 'Diadema', 
                                        'Dracena' => 'Dracena', 
                                        'Fco Badaró' => 'Fco Badaró', 
                                        'Francisco Morato' => 'Francisco Morato',
                                        'Franco da Rocha' => 'Franco da Rocha', 
                                        'Guaianazes' => 'Guaianazes', 
                                        'Guaratinguetá' => 'Guaratinguetá', 
                                        'Guarulhos' => 'Guarulhos', 
                                        'Itaquaquecetuba' => 'Itaquaquecetuba', 
                                        'Jacareí' => 'Jacareí',
                                        'Jandira' => 'Jandira',
                                        'Jundiai' => 'Jundiai', 
                                        'Juquitiba' => 'Juquitiba', 
                                        'Maua' => 'Maua', 
                                        'Minas Gerais' => 'Minas Gerais',
                                        'Mogi das Cruzes' => 'Mogi das Cruzes', 
                                        'Mongaguá' => 'Mongaguá', 
                                        'Osasco' => 'Osasco', 
                                        'Petrolina' => 'Petrolina', 
                                        'Pirapora do Bom Jesus' => 'Pirapora do Bom Jesus', 
                                        'Poá' => 'Poá',
                                        'Ponta Porã' => 'Ponta Porã',
                                        'Ribeirão Preto' => 'Ribeirão Preto', 
                                        'Rio de Janeiro' => 'Rio de Janeiro', 
                                        'Rio Grande da Serra' => 'Rio Grande da Serra', 
                                        'Santana do Parnaíba' => 'Santana do Parnaíba',
                                        'Santo André' => 'Santo André', 
                                        'Santos' => 'Santos', 
                                        'São Bernardo do Campo' => 'São Bernardo do Campo', 
                                        'São Caetano do Sul' => 'São Caetano do Sul', 
                                        'São José dos Campos' => 'São José dos Campos', 
                                        'Sorocaba' => 'Sorocaba',
                                        'Sumaré' => 'Sumaré',
                                        'Taboão da Serra' => 'Taboão da Serra', 
                                        'Rio de Janeiro' => 'Rio de Janeiro', 
                                        'Taubaté' => 'Taubaté', 
                                        'Vitória da Cosquista' => 'Vitória da Cosquista',
                                        '0' => 'Outra'                                
                                        ],null,['class'=> 'form-control select2']); !!}                                                     
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('emp_serv_estado', 'Estado:') !!}
                                            {!! Form::select('emp_serv_estado', 
                                            [
                                            'SP' => 'SP', 
                                            'AC' => 'AC', 
                                            'AL' => 'AL',
                                            'AM' => 'AM', 
                                            'AP' => 'AP', 
                                            'BA' => 'BA', 
                                            'CE' => 'CE', 
                                            'DF' => 'DF', 
                                            'ES' => 'ES', 
                                            'GO' => 'GO',
                                            'MA' => 'MA',
                                            'MG' => 'MG', 
                                            'MS' => 'MS', 
                                            'MT' => 'MT', 
                                            'PA' => 'PA',
                                            'PB' => 'PB', 
                                            'PE' => 'PE', 
                                            'PR' => 'PR', 
                                            'PI' => 'PI', 
                                            'RJ' => 'RJ', 
                                            'RN' => 'RN',
                                            'RO' => 'RO',                                
                                            'RR' => 'RR',
                                            'RS' => 'RS', 
                                            'SC' => 'SC', 
                                            'SE' => 'SE', 
                                            'TO' => 'TO'                               
                                            ],null,['class'=> 'form-control select2']); !!}  
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        {!! Form::label('emp_serv_cnpj', 'CNPJ:') !!}
                                        {!! Form::input('text', 'emp_serv_cnpj', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'CNPJ']) !!}
                                        </div>
                                    </div>                                     
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('tipo_contratacao', 'Tipo de Contratação:') !!}
                            {!! Form::select('tipo_contratacao', 
                                    [
                                    'A' => 'Com Registro', 
                                    'B' => 'Sem Registro',
                                    'C' => 'Ambos',                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'tipo_contratacao']); !!}
                            </div>   
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('nome', 'Data de Admissão:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::input('text', 'data_admissao', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'data_admissao']) !!}
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('nome', 'Data de Demissão:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::input('text', 'data_demissao', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'data_demissao']) !!}
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('nome', 'Data de Registro:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::input('text', 'data_registro', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'data_registro']) !!}
                            </div>
                            </div>
                        </div>                                                
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('baixa_ctps', 'Deu baixa na CTPS?') !!}
                            {!! Form::select('baixa_ctps', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'baixa_ctps']); !!}
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('baixa_ctps_quando', 'Quando?') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::input('text', 'baixa_ctps_quando', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'quando']) !!}
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('pis', 'PIS:') !!}
                            {!! Form::input('text', 'pis', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'PIS']) !!}
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('tipo_contratacao', 'Jornada semanal:') !!}
                                <div class="displayflex">
                                    {!! Form::input('text', 'jornsem_hora_inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora início']) !!}
                                    <span>às</span>
                                    {!! Form::input('text', 'jornsem_hora_fim', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora Fim']) !!}                             
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('tipo_contratacao', 'Jornada de Sábado:') !!}
                                <div class="displayflex">
                                    {!! Form::input('text', 'jornsab_hora_inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora início']) !!}
                                    <span>às</span>
                                    {!! Form::input('text', 'jornsab_hora_fim', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora Fim']) !!}                             
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('tipo_contratacao', 'Jornada de Domigo:') !!}
                                <div class="displayflex">
                                    {!! Form::input('text', 'jorndom_hora_inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora início']) !!}
                                    <span>às</span>
                                    {!! Form::input('text', 'jorndom_hora_fim', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora Fim']) !!}                             
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('intervalo', 'Horário de Intervalo:') !!}
                            {!! Form::input('text', 'intervalo', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Horário de Intervalo']) !!}
                            </div>                                    
                        </div>                                                  
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::label('jornsem_dia_inicio', 'Início:') !!}
                                        {!! Form::select('jornsem_dia_inicio', 
                                        [
                                        '1' => 'Segunda', 
                                        '2' => 'Terça',
                                        '3' => 'Quarta',
                                        '4' => 'Quinta',
                                        '5' => 'Sexta',                                                                                                               
                                        ],null,['class'=> 'form-control select2', 'id'=>'tipo_contratacao']); !!}                                        
                                    </div>
                                    <div class="col-md-6">
                                        {!! Form::label('jornsem_dia_fim', 'Fim:') !!}
                                        {!! Form::select('jornsem_dia_fim', 
                                        [
                                        '1' => 'Segunda', 
                                        '2' => 'Terça',
                                        '3' => 'Quarta',
                                        '4' => 'Quinta',
                                        '5' => 'Sexta',                                                                                                               
                                        ],null,['class'=> 'form-control select2', 'id'=>'tipo_contratacao']); !!}                                        
                                    </div>                                    
                                </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('jorn_obs', 'Observação:') !!}
                            {!! Form::input('text', 'jorn_obs', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Observação']) !!}
                            </div>                                    
                        </div>                           
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('intervalo_sab', 'Intervalo aos Sábados?') !!}
                            {!! Form::select('intervalo_sab', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'intervalo_sab']); !!}
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('intervalo_dom', 'Intervalo aos Domigos?') !!}
                            {!! Form::select('intervalo_dom', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'intervalo_dom']); !!}
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('batia_cartao', 'Batia cartão?') !!}
                            {!! Form::select('batia_cartao', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'batia_cartao']); !!}
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::label('tipo_contratacao', 'Em que horário?') !!}
                                <div class="displayflex">
                                    {!! Form::input('text', 'batia_cartao_horario_inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora início']) !!}
                                    <span>às</span>
                                    {!! Form::input('text', 'batia_cartao_horario_inicio', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Hora Fim']) !!}                             
                                </div>
                            </div> 
                        </div>                                                                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('maior_salario', 'Maior salário percebido (R$):') !!}
                            {!! Form::input('text', 'maior_salario', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Maior salário percebido:']) !!}
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('salario_porfora', 'Recebia salário por fora?') !!}
                                {!! Form::select('salario_porfora', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'salario_porfora']); !!}
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('salario_porfora_val', 'Quanto? (R$)') !!}
                            {!! Form::input('text', 'salario_porfora_val', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor do salário por fora:']) !!}
                            </div>   
                        </div>                                                
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('vale_transporte', 'Recebia vale transporte?') !!}
                                {!! Form::select('vale_transporte', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'vale_transporte']); !!}
                            </div>                                    
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('num_conducao', 'Número de conduções:') !!}
                            {!! Form::input('text', 'num_conducao', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Número de conduções:']) !!}   
                            </div>                              
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('tipo_conducao', 'Tipo de Condução:') !!}
                            {!! Form::input('text', 'tipo_conducao', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Tipo de Condução:']) !!}                                
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('motivo_rescisao', 'Motivo da rescisão:') !!}
                            {!! Form::input('text', 'motivo_rescisao', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Motivo da rescisão:']) !!}
                            </div>                                      
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('aviso_previo', 'Cumpriu ou Recebeu Aviso Prévio?') !!}
                                {!! Form::select('aviso_previo', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'aviso_previo']); !!}
                            </div>                                      
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('num_ferias', 'Quantas férias já tirou?') !!}
                            {!! Form::input('text', 'num_ferias', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quantas férias já tirou?']) !!}
                            </div>                         
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('num_ferias_anos', 'Quais os anos?') !!}
                            {!! Form::input('text', 'num_ferias_anos', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quais os anos?']) !!}
                            </div>                         
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ferias_traba', ' Tirou Férias Trabalhando?') !!}
                                {!! Form::select('ferias_traba', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'ferias_traba']); !!}
                            </div>                             
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ferias_traba_num', 'Quais os anos?') !!}
                                {!! Form::input('text', 'ferias_traba_num', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quais os anos?']) !!}
                            </div>                             
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ferias_venc_terco', 'Recebeu férias venciadas + 1/3?') !!}
                                {!! Form::select('ferias_venc_terco', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'ferias_venc_terco']); !!}
                            </div>                             
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ferias_prop_terco', 'Recebeu férias proporcionais + 1/3?') !!}
                                {!! Form::select('ferias_prop_terco', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'ferias_prop_terco']); !!}
                            </div>                             
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('decimoterc_atrasado', 'Existe 13º salário de anos anteriores a pagar?') !!}
                                {!! Form::select('decimoterc_atrasado', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'decimoterc_atrasado']); !!}                            
                            </div>                         
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('decimoterc_anos', 'Quais os anos?') !!}
                            {!! Form::input('text', 'decimoterc_anos', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quais os anos?']) !!}
                            </div>                         
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('decimoterc_prop', 'Recebeu 13º salário proporcional?') !!}
                                {!! Form::select('decimoterc_prop', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'decimoterc_prop']); !!}
                            </div>                             
                        </div>                       
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('fgts_depositado', 'FGTS foi depositado?') !!}
                                {!! Form::select('fgts_depositado', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'fgts_depositado']); !!}
                            </div>                         
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('fgts_depositado_qto', 'Quanto foi depositado? (R$)') !!}
                            {!! Form::input('text', 'fgts_depositado_qto', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quanto foi depositado? (R$)']) !!}
                            </div>                         
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('verbas_rescisorias', 'Recebeu Verbas Rescisórias?') !!}
                                {!! Form::select('verbas_rescisorias', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'verbas_rescisorias']); !!}
                            </div>                         
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('verbas_rescisorias_qto', 'Quanto foi recebido? (R$)') !!}
                            {!! Form::input('text', 'verbas_rescisorias_qto', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quanto foi recebido? (R$)']) !!}
                            </div>                         
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('material_insalubre', 'Trabalhava com material insalubre?') !!}
                                {!! Form::select('material_insalubre', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'material_insalubre']); !!}
                            </div>                         
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('material_insalubre_quais', 'Quais?') !!}
                            {!! Form::input('text', 'material_insalubre_quais', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Quais?']) !!}
                            </div>                         
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('recebia_adicional', 'Recebia adicional por isso?') !!}
                                {!! Form::select('recebia_adicional', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'recebia_adicional']); !!}
                            </div>                         
                        </div>                                                
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('periculosidade', 'Há periculosidade a pleitear?') !!}
                                {!! Form::select('periculosidade', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'periculosidade']); !!}
                            </div>                         
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('equiparacao_salarial', 'E equiparação salarial?') !!}
                                {!! Form::select('equiparacao_salarial', 
                                    [
                                    'N' => 'Não', 
                                    'S' => 'Sim'                             
                                    ],null,['class'=> 'form-control select2', 'id'=>'equiparacao_salarial']); !!}
                            </div>                         
                        </div>                                                          
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('paradigma', 'Nome do paradigma, função exercida e data de admissão pela reclamada:') !!}
                                {!! Form::textarea('paradigma', null, ['id' => 'paradigma', 'rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('texto_declaracao', 'Texto da Declaração:') !!}
                                {!! Form::textarea('texto_declaracao', null, ['id' => 'texto_declaracao', 'rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    @if(Request::is('*/editar'))
                    <div class="row">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                {!! Form::label('forma_pagto', 'Forma de Pagamento:') !!}
                                @if ($contratoc->forma_pagto != null)
                                {!! Form::select('forma_pagto', 
                                    [                             
                                    'A' => 'Honorário Inicial', 
                                    'B' => 'Honorário Final', 
                                    'C' => 'Honorário Inicial + Final',
                                    'D' => 'Honorário Mensal', 
                                    'E' => 'Sem Cobrança de Honorários'                          
                                    ],$contratoc->forma_pagto,['class'=> 'form-control select2', 'id'=>'selectforma']); !!}
                                @else
                                {!! Form::select('forma_pagto', 
                                    [                             
                                    'A' => 'Honorário Inicial', 
                                    'B' => 'Honorário Final', 
                                    'C' => 'Honorário Inicial + Final',
                                    'D' => 'Honorário Mensal', 
                                    'E' => 'Sem Cobrança de Honorários'                          
                                    ],null,['class'=> 'form-control select2', 'id'=>'selectforma']); !!}                                
                                @endif                                                  
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
                                    @if ($contratoc->honorinicial_val != null)
                                    {!! Form::input('text', 'honorinicial_val', $contratoc->honorinicial_val, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor Honorário Inicial:', 'id'=>'honorinicial_val']) !!}
                                    @else
                                    {!! Form::input('text', 'honorinicial_val', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor Honorário Inicial:', 'id'=>'honorinicial_val']) !!}
                                    @endif                                                                       
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
                                    @if ($contratoc->honorinicial_data != null)
                                    {!! Form::input('text', 'honorinicial_data', $contratoc->honorinicial_data, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'honorinicial_data']) !!}
                                    @else
                                    {!! Form::input('text', 'honorinicial_data', null, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'honorinicial_data']) !!} 
                                    @endif                                      
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    {!! Form::label('honorfinal_porc', ' Porcentagem de  Honorário Final:') !!}
                                    @if ($contratoc->honorfinal_porc != null)
                                    {!! Form::input('text', 'honorfinal_porc', $contratoc->honorfinal_porc, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Porcentagem de  Honorário Final', 'id'=>'honorfinal_porc']) !!}
                                    @else
                                    {!! Form::input('text', 'honorfinal_porc', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Porcentagem de  Honorário Final', 'id'=>'honorfinal_porc']) !!}
                                    @endif                                                                    
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                    {!! Form::label('honormensal_val', 'Valor da Parcela do  Honorário Mensal:') !!}
                                    @if ($contratoc->honormensal_val != null)
                                    {!! Form::input('text', 'honormensal_val', $contratoc->honormensal_val, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor da Parcela do  Honorário Mensal:', 'id'=>'honormensal_val']) !!}
                                    @else
                                    {!! Form::input('text', 'honormensal_val', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor da Parcela do  Honorário Mensal:', 'id'=>'honormensal_val']) !!}
                                    @endif                                                                      
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    {!! Form::label('honormensal_parc', 'Número de Parcelas:') !!}
                                    @if ($contratoc->honormensal_parc != null)
                                    {!! Form::input('text', 'honormensal_parc', $contratoc->honormensal_parc, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Número de Parcelas:', 'id'=>'honormensal_parc']) !!}
                                    @else
                                    {!! Form::input('text', 'honormensal_parc', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Número de Parcelas:', 'id'=>'honormensal_parc']) !!}
                                    @endif                                                              
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                    {!! Form::label('honormensal_data', 'Data do 1º Pagamento:') !!}
                                    @if ($contratoc->honormensal_data != null)
                                    {!! Form::input('text', 'honormensal_data', $contratoc->honormensal_data, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'honormensal_data']) !!}
                                    @else
                                    {!! Form::input('text', 'honormensal_data', null, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'honormensal_data']) !!}
                                    @endif                                                    
                                <!-- /.input group -->
                            </div>
                        </div>                    
                    </div>
                        </div>
                    </div>
                    @else                                                                                                                                                                                                                                
                    @endif
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
                            {!! Form::model($contratot, ['method'=> 'PATCH', 'url' => 'admin/contratot/'.$contratot->id_contrato.'/atualizardoc','files' => true, 'class'=>'uploader']) !!}
                            {!! Form::label('contrato_c', 'Anexar contrato Mensalista:') !!}   
                            @if ($contratoc->contrato_c != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_c)}}">{{$contratoc->contrato_c}}</a></div>
                            @endif                             
                            <div class="uploadert contrato_c">


                                {!! Form::file('contrato_c',['id'=>'file-upload']) !!}
                                
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>
                            <br>
                            {!! Form::label('entrevista', 'Anexar Entrevista:') !!}
                            @if ($contratoc->contrato_empresa != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_empresa)}}">{{$contratoc->contrato_empresa}}</a></div>
                            @endif                                    
                            <div class="uploadert entrevista">
                                {!! Form::file('entrevista',['id'=>'file-upload2']) !!}
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>
                            <br>                            
                            {!! Form::label('contrato', 'Anexar contrato:') !!}
                            @if ($contratoc->contrato != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_c)}}">{{$contratoc->contrato}}</a></div>
                            @endif                                    
                            <div class="uploadert contrato">
                                {!! Form::file('contrato',['id'=>'file-upload2']) !!}
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>
                            <br>
                            {!! Form::label('procuracao', 'Anexar Procuração:') !!}
                            @if ($contratoc->procuracao != null)
                            <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/contratos/'.$contratoc->contrato_c)}}">{{$contratoc->procuracao}}</a></div>
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
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Forma de Pagamento</h3>
                </div>
                <div class="box-body">
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
                                    {!! Form::input('text', 'honorinicial_data', null, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'honorinicial_data']) !!}   
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
                        <div class="col-md-6">
                            <div class="form-group">
                                    {!! Form::label('honormensal_val', 'Valor da Parcela do  Honorário Mensal:') !!}
                                    {!! Form::input('text', 'honormensal_val', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Valor da Parcela do  Honorário Mensal:', 'id'=>'honormensal_val']) !!}                                   
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    {!! Form::label('honormensal_parc', 'Número de Parcelas:') !!}
                                    {!! Form::input('text', 'honormensal_parc', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Número de Parcelas:', 'id'=>'honormensal_parc']) !!}                          
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    {!! Form::label('honormensal_data', 'Data do 1º Pagamento:') !!}
                                    {!! Form::input('text', 'honormensal_data', null, ['class' => 'form-control', 'autofocus',  'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'', 'id'=>'honormensal_data']) !!}                          
                                <!-- /.input group -->
                            </div>
                        </div>                    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                        </div>
                    </div>            
                </div>
            </div>                                                 
        </div>        
        @endif        
    </div>
@stop