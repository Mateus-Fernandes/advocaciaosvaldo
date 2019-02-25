@extends('adminlte::page')


@if(Request::is('*/editarf'))
                @section('title', 'Editar Cliente')
            @else
                @section('title', 'Novo Cliente - Pessoa Física')
            @endif
@section('content_header')
    <h1>
            @if(Request::is('*/editarf'))
                {{'Editar Cliente - '.$cliente->nome}}
            @else
                {{'Adicionar Cliente - Pessoa Física'}}
            @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Clientes</a></li>
        <li><a href="">
            @if(Request::is('*/editarf'))
                {{'Editar Cliente - '.$cliente->nome}}
            @else
                {{'Adicionar Cliente - Pessoa Física'}}
            @endif
        </a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
            @if(Request::is('*/editarf'))
                {{'Editar Cliente - '.$cliente->nome}}
            @else
                {{'Adicionar Cliente - Pessoa Física'}}
            @endif
            </h3>
            
        </div>
        <div class="box-body">
            @if(Session::has('mensagem_sucesso'))
                <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
            @endif
            @if(Request::is('*/editarf'))
                {!! Form::model($cliente, ['method'=> 'PATCH', 'url' => 'admin/cliente/'.$cliente->id_cliente.'/atualizarf']) !!}
            @else
                {!! Form::open(['url' => 'admin/cliente/adicionarf']) !!}
            @endif
            {!! Form::open(['url' => 'admin/cliente/adicionarf']) !!}
                
            
                <div class="row">                 
                        <div class="form-group col-md-10">
                            {!! Form::label('nome', 'Nome:') !!}
                            {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Nome']) !!}
                    </div>
                </div>
                
                <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('endereco', 'Endereço:') !!}
                            {!! Form::input('text', 'endereco', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Endereço']) !!}
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('bairro', 'Bairro:') !!}
                            {!! Form::input('text', 'bairro', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Bairro']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                            {!! Form::label('cep', 'CEP:') !!}
                            {!! Form::input('text', 'cep', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'CEP']) !!}
                            </div>
                        </div>
                                                            
                </div>
                <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                            {!! Form::label('cidade', 'Cidade:') !!}
                            {!! Form::select('cidade', 
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
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('estado', 'Estado:') !!}
                                {!! Form::select('estado', 
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
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('telefone', 'Telefone:') !!}

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                {!! Form::input('text', 'telefone', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"mask": "(99) 99999999"']) !!}                                
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('celular_recado', 'Celular / Recado:') !!}

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                {!! Form::input('text', 'celular_recado', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"mask": "(99) 99999999"']) !!}   
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('rg_ie', 'RG:') !!}
                                {!! Form::input('text', 'rg_ie', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'RG:']) !!}                                
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('cpf_cnpj', 'CPF:') !!}
                                {!! Form::input('text', 'cpf_cnpj', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"mask": "999.999.999-99"']) !!}                                 
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('ctps', 'CTPS:') !!}
                                {!! Form::input('text', 'ctps', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'CTPS:']) !!}                                   
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('serie', 'Série:') !!}
                                {!! Form::input('text', 'serie', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Série:']) !!}                           
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('data_nasc', 'Data de Nascimento:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::input('text', 'data_nasc', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "dd-mm-yyyy"', 'data-mask'=>'']) !!}
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('data_nasc', 'Data de Nascimento da Mãe:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::input('text', 'data_nasc_mae', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "dd-mm-yyyy"', 'data-mask'=>'']) !!}
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('nacionalidade', 'Nacionalidade:') !!}
                            {!! Form::select('nacionalidade', 
                            [
                            'brasileira' => 'brasileira', 
                            'Brasileiro' => 'Brasileiro',
                            'Brasileiros' => 'Brasileiros', 
                            'coreana' => 'coreana', 
                            'Coreano' => 'Coreano', 
                            'Cubana' => 'Cubana', 
                            'espanhol' => 'espanhol', 
                            'Italiano' => 'Italiano', 
                            'Iugoslava' => 'Iugoslava',
                            'Japonesa' => 'Japonesa',
                            'lituana' => 'lituana', 
                            'Polonesa' => 'Polonesa', 
                            'Português' => 'Português', 
                            'portuguesa' => 'portuguesa', 
                            '0' => 'Outra'                                
                            ], null, ['placeholder' => 'Selecione a Nacionalidade..', 'class'=> 'form-control select2']); !!}

                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('estado_civil', 'Estado Civil:') !!}
                            {!! Form::select('estado_civil', 
                            [
                            'A' => 'Solteiro(a)', 
                            'B' => 'Amasiado(a)',
                            'C' => 'Casado(a)', 
                            'D' => 'Separado(a)', 
                            'E' => 'Viúvo(a)', 
                            'F' => 'Desquitado(a)', 
                            'G' => 'Divorciado(a)'                             
                            ], null, ['placeholder' => 'Selecione o Estado Civil..', 'class'=> 'form-control select2']); !!}                            
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                                {!! Form::label('profissao', 'Profissão:') !!}
                                {!! Form::input('text', 'profissao', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Profissão:']) !!}                                 
                                <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('site', 'Site:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                {!! Form::input('text', 'site', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Site:']) !!}   
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('email', 'Email:') !!}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                {!! Form::input('text', 'email', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Email:']) !!}   
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('obs', 'Observações:') !!}
                        {!! Form::text('obs', null, ['class' => 'form-control obsgrande','style'=>'height:100px;', 'autofocus', 'placeholder'=> 'Insira aqui as observações:', 'rows'=>'6', 'cols'=>'30']) !!}  
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <div class="center-block text-center" style="margin-top:30px;">
                        
                        @if(Request::is('*/editarf'))
                            {!! Form::submit('Atualizar Cliente',['class'=>'btn btn-success btn-lg', 'style'=>'margin-top:30px;']) !!}
                        @else
                            {!! Form::submit('Cadastrar Cliente',['class'=>'btn btn-success btn-lg', 'style'=>'margin-top:30px;']) !!}
                        @endif                        
                    </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        
    </div>
@stop