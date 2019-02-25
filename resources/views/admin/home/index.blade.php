@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$clientes_num->count()}}</h3>

                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route ('admin.cliente') }}" class="small-box-footer">Listar Clientes <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success for">
              <div class="inner">
                <h3>{{$contratosc_num->count()}}</h3>

                <p>Contratos Cível</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route ('admin.contratoc') }}" class="small-box-footer">Listar Contratos Cível <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning for">
              <div class="inner">
                <h3>{{$contratost_num->count()}}</h3>

                <p>Contratos Trabalhista</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route ('admin.contratot') }}" class="small-box-footer">Listar Contratos Trabalhista <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger for">
              <div class="inner">
                <h3>{{$processos_num->count()}}</h3>

                <p>Processos</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route ('admin.processo') }}" class="small-box-footer">Listar Processos<i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Últimos Clientes cadastrados</h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        Nome:
                                    </td>
                                    <td>
                                        Data de Cadastro
                                    </td>
                                </tr>
                                @foreach($clientes as $c)
                                <tr>
                                    <td>
                                        {{$c->id_cliente}}
                                    </td>
                                    <td>
                                        {{$c->nome}}
                                    </td>
                                    <td>
                                        {{$c->data_cad}}
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Últimos Processos Cadastrados</h3>
                    </div>
                    <div class="box-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        Parte Contrária:
                                    </td>
                                    <td>
                                        Número do processo
                                    </td>
                                </tr>
                                @foreach($clientes as $p)
                                <tr>
                                    <td>
                                        {{$p->id_processo}}
                                    </td>
                                    <td>
                                        {{$p->parte_contraria}}
                                    </td>
                                    <td>
                                        {{$p->num_processo}}
                                    </td>                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
@stop