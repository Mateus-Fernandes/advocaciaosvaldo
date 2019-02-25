@extends('adminlte::page')


@if(Request::is('*/editar'))
                @section('title', 'Editar Processos')
            @else
                @section('title', 'Novo Processos')
            @endif
@section('content_header')
    <h1>
            @if(Request::is('*/editar'))
                {{'Editar Processos - '.$processo->id_processo}}
            @else
                {{'Adicionar Processos'}}
            @endif
    </h1>
    <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="">Processos</a></li>
        <li><a href="">
            @if(Request::is('*/editar'))
                {{'Editar Processos - '.$processo->id_processo}}
            @else
                {{'Adicionar Processos'}}
            @endif
        </a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        @if(Request::is('*/editar'))
        <div class="col-md-6">
        @else
        <div class="col-md-8">
        @endif
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                @if(Request::is('*/editar'))
                    {{'Editar Processos - '.$processo->id_processo}}
                @else
                    {{'Adicionar Processos'}}
                @endif
                </h3>
                
            </div>
            <div class="box-body">
                @if(Session::has('mensagem_sucesso'))
                    <div class="alert alert-success">{{ Session::get('mensagem_sucesso')}}</div>
                @endif
                @if(Request::is('*/editar'))
                    {!! Form::model($processo, ['method'=> 'PATCH', 'url' => 'admin/processo/'.$processo->id_processo.'/atualizar']) !!}
                @else
                    {!! Form::open(['url' => 'admin/processo/adicionar', 'id'=>'formId']) !!}
                @endif                
                
                    <div class="row">                 
                            <div class="form-group col-md-12">
                                {!! Form::label('cliente', 'Selecione o Contrato:') !!}
                                <select name="cliente" id="cliente" class="form-control select2">
                                @if(Request::is('*/editar'))
                                
                                @if($cliente[0]->tipo == 'T')
                                    <option value="{{$cliente[0]->id_contrato}}">{{$cliente[0]->nome}} - Processos</option>
                                    @elseif($cliente[0]->tipo == 'Z')
                                    <option value="{{$cliente[0]->id_contrato}}">{{$cliente[0]->nome}} - Contrato de Cobranças (cheques)</option>                                        
                                    @else
                                    <option value="{{$cliente[0]->id_contrato}}">{{$cliente[0]->nome}} - Contrato Cível</option>
                                    @endif                                
                                @else
                                <option value="null">Selecione o contrato...</option>
                                @endif
                                @foreach($itemlist as $item)
                                    
                                    @if($item->tipo == 'T')
                                    <option value="{{ $item->id_contrato }}">{{ $item->nome}} - <b>Processos</b></option>
                                    @elseif($item->tipo == 'Z')
                                    <option value="{{ $item->id_contrato }}">{{ $item->nome}} - <b>Contrato de Cobranças (cheques)</b></option>                                        
                                    @else
                                    <option value="{{ $item->id_contrato }}">{{ $item->nome}} - <b>Contrato Cível</b></option>
                                    @endif
                                    
                                @endforeach
                                </select>
                                                                
                        </div>
                    </div>
                    @if(Request::is('*/editar'))
                    <div class="row">
                        
                            <div id="mostracliente"></div>
                        
                    </div>
                    @else
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Dados sobre o Processo</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('num_processo', 'Número do Processo:') !!}
                                {!! Form::input('text', 'num_processo', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Número do Processo:']) !!}
                            </div>
                        </div>                                                   
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('natureza', 'Natureza:') !!}
                                {!! Form::input('text', 'natureza', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Natureza:']) !!}
                            </div>
                        </div>                                                   
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('vara', 'Vara:') !!}
                                {!! Form::input('text', 'vara', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Vara:']) !!}
                            </div>
                        </div>                                                   
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('pasta', 'Pasta:') !!}
                                {!! Form::input('text', 'pasta', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Pasta:']) !!}
                            </div>
                        </div>                                                   
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Dados da Parte Contrária</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('parte_contraria', 'Nome:') !!}
                                {!! Form::input('text', 'parte_contraria', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Nome:']) !!}
                            </div>
                        </div>                                                   
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('pc_telefone', 'Telefone:') !!}

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    {!! Form::input('text', 'pc_telefone', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"mask": "(99) 99999999"']) !!}                                
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('pc_email', 'Email:') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    {!! Form::input('text', 'pc_email', null, ['class' => 'form-control', 'autofocus', 'placeholder'=> 'Email:']) !!}   
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>                                                                          
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('obs', 'Observações:') !!}
                                {!! Form::textarea('obs', null, ['id' => 'paradigma', 'rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
                            </div>
                        </div>                                                   
                    </div>
                    @if(Request::is('*/editar'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            {!! Form::label('data_saida', 'Tornar Processo Inativo:') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::input('text', 'data_saida', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "yyyy-mm-dd"', 'data-mask'=>'']) !!}
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    @else
                        
                    @endif                      
                                                            
                    <div class="row">
                        <div class="col-md-12">
                        <div class="center-block text-center" style="margin-top:30px;">
                            
                            @if(Request::is('*/editar'))
                                {!! Form::submit('Atualizar Processo',['class'=>'btn btn-success btn-lg']) !!}
                            @else
                                {!! Form::submit('Cadastrar Processo',['class'=>'btn btn-success btn-lg']) !!}
                            @endif                        
                        </div>
                        </div>
                    </div>


                {!! Form::close() !!}
            </div>
            
        </div>

        @if(Request::is('*/editar'))
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Enviar Relátório para o Cliente</h3>
            </div>
            <div class="box-body">
                <a class="btn btn-default" href="{{ route ('processo.pdf', $processo->id_processo) }}">Baixar relatório</a>
            </div>
        </div>        
        </div>
        <div class="col-md-6">        

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Registrar Andamento do Processo</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                     {!! Form::model($processo_andamento, ['method'=> 'PATCH', 'url' => 'admin/processo/'.$cliente[0]->id_processo.'/andamento','files' => true, 'class'=>'uploader', 'id'=>'registra_andamento']) !!}
                        <div class="col-md-12">
                            @if(Session::has('mensagem_sucesso2'))
                            <div class="alert alert-success">{{ Session::get('mensagem_sucesso2')}}</div>
                            @endif                          
                            <div class="form-group">
                            {!! Form::label('datahora', 'Data / Hora') !!}
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>                                
                                    {!! Form::input('text', 'datahora', null, ['class' => 'form-control', 'autofocus', 'data-inputmask'=> '"alias": "datetime"', 'data-mask'=>'']) !!}
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('andamento', 'Andamento:') !!}
                                {!! Form::textarea('andamento', null, ['id' => 'andamento', 'rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
                            </div>
                        </div>                                                   
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('doc', 'Petições / Documentos::') !!}                             
                            <div class="uploadert contrato_c">
                                {!! Form::file('doc',['id'=>'file-upload']) !!}
                                <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                            </div>                      
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('Registrar Andamento',['class'=>'btn btn-primary', 'style'=>'margin-top:30px;']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>                                                  
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Histórico de Andamentos</h3>
                </div>
                <div class="box-body">
                    
                    @foreach($processo_andamento as $pro)
                    <div class="colunaAndamento">
                        <div class="row" style="display:flex;align-items: center;">
                            <div class="col-md-2">
                                <b>Data e Hora:</b>
                            </div>
                            <div class="col-md-8">
                                {{ $pro->datahora}}                            
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <b>Andamento:</b>
                            </div>
                            <div class="col-md-8">
                                {{ $pro->andamento}}                            
                            </div>
                            <div class="col-md-2">
                            <a><button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal{{$pro->id_andamento}}" >Editar</button></a>
                            <a href="/admin/processo/{{$pro->id_andamento}}/deletarandamento"><button class="btn btn-danger btn-xs">Excluir</button></a>   
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <b>Documentos:</b>
                            </div>
                            <div class="col-md-8">
                                {{ $pro->doc}}                            
                            </div>
                            <div class="col-md-2">
                                
                            </div>                            
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal{{$pro->id_andamento}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$pro->id_andamento}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Editar Andamento</h4>
                            </div>
                            <div class="modal-body">
                            <div class="row">
                                {!! Form::model($processo_andamento, ['method'=> 'PATCH', 'url' => 'admin/processo/'.$pro->id_andamento.'/andamentosalva','files' => true, 'class'=>'uploader', 'id'=>'registra_andamento']) !!}
                                    <div class="col-md-12">
                                        @if(Session::has('mensagem_sucesso2'))
                                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso2')}}</div>
                                        @endif                          
                                        <div class="form-group">
                                        {!! Form::label('datahora', 'Data / Hora') !!}
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>                                
                                                {!! Form::input('text','datahora', $pro->datahora, ['class' => 'form-control', 'autofocus']) !!}
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('andamento', 'Andamento:') !!}
                                            {!! Form::textarea('andamento', $pro->andamento, ['rows' => 4, 'cols' => 54, 'class' => 'form-control']) !!}
                                        </div>
                                    </div>                                                   
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                                                    
                                        {!! Form::label('doc', 'Petições / Documentos:') !!} 
                                        @if ($pro->doc != null)
                                        <div class="well"><span class="label label-default"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span> <a target="_blank" href="{{ url('storage/processos/'.$pro->doc)}}">{{$pro->doc}}</a></div>
                                        @endif                                    
                                        <div class="uploadert procuracao">
                                            {!! Form::file('doc',['id'=>'file-upload']) !!}
                                            <p>Arraste o arquivo e solte aqui, ou clique aqui para selecionar o arquivo</p>   
                                        </div>                                                                
                                    </div>
                                </div>
 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                {!! Form::submit('Salvar Andamento',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                            </div>
                        </div>
                    </div>                                        
                    @endforeach                      
                                  
                </div>
            </div>                                                              
        </div>
        @else
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Informações do Cliente / Contrato</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                <div id="mostracliente"></div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>         
                </div>
            </div>                                                              
        </div>        
        @endif        
    </div>
    <script>
    
    </script>
@stop