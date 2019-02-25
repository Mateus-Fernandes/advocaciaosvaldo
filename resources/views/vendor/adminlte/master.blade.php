<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
@yield('title', config('adminlte.title', 'AdminLTE 2'))
@yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css') }}">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <meta id="metakey" name="csrf-token" content="{{ csrf_token() }}">
    @if(config('adminlte.plugins.select2'))
        <!-- Select2 -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    @endif

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    @if(config('adminlte.plugins.datatables'))
        <!-- DataTables with bootstrap 3 style -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
    @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition @yield('body_class')" onload="proprietarios()">

@yield('body')

<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/bindings/inputmask.binding.min.js"></script>

@if(config('adminlte.plugins.select2'))
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
@endif

<script>



jq2 = jQuery.noConflict();
jq2(function( $ ) {



    var cliente = $('#cliente').val();
    if(cliente != 'null'){
        var url = 'http://laravel.local:8080/admin/cliente/'+cliente+'/info';
        $.ajax({
        type: "get",
        url: url,
        datatype: 'html',

        success: function(response){
            $("#mostracliente").html(response);
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
        });     

    }else{
        $("#mostracliente").html('<div class="col-md-12">Selecione um contrato para exibir as informações aqui...</div>');
    }
    $("#cliente").on("select2:select", function (e) { 
        var select_val = $(e.currentTarget).val();

        var url = 'http://laravel.local:8080/admin/cliente/'+select_val+'/info';
        $.ajax({
        type: "get",
        url: url,
        datatype: 'html',

        success: function(response){
            $("#mostracliente").html(response);
            console.log(response);
        },
        error: function(response) {
            console.log(response);
        }
        });        
    });

       

    $('.select2').select2();
    $('#selectforma').select2();
    $('#emp_servico').select2();
    $('#tipo_contratacao').select2();
    var tipo_contratacao = $('#tipo_contratacao').val();
    if(tipo_contratacao == "A"){
            $('#data_admissao').prop( "disabled", true );
            $('#data_demissao').prop( "disabled", false );
            $('#data_registro').prop( "disabled", false );          
        }
        if(tipo_contratacao == "B"){
            $('#data_admissao').prop( "disabled", false );
            $('#data_demissao').prop( "disabled", false );
            $('#data_registro').prop( "disabled", true );             
        }
        if(selec == "C"){
            $('#data_admissao').prop( "disabled", false );
            $('#data_demissao').prop( "disabled", false );
            $('#data_registro').prop( "disabled", false );              
    }    
    var selec = $('#selectforma').val();
    if(selec == "A"){
            $('#honorfinal_porc').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }
        if(selec == "B"){
            $('#honorfinal_porc').prop( "disabled", false );  

            $('#honorinicial_val').prop( "disabled", true );
            $('#honorinicial_data').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }
        if(selec == "C"){
            $('#honorfinal_porc').prop( "disabled", false );  

            $('#honorinicial_val').prop( "disabled", false );
            $('#honorinicial_data').prop( "disabled", false );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }
        if(selec == "D"){
            $('#honorfinal_porc').prop( "disabled", true );  

            $('#honorinicial_val').prop( "disabled", true );
            $('#honorinicial_data').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", false );
            $('#honormensal_data').prop( "disabled", false );
            $('#honormensal_parc').prop( "disabled", false );             
        }
        if(selec == "E"){
            $('#honorfinal_porc').prop( "disabled", true );  

            $('#honorinicial_val').prop( "disabled", true );
            $('#honorinicial_data').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        } 
    $("#selectforma").on("select2:select", function (e) { 
        var select_val = $(e.currentTarget).val();
        if(select_val == "A"){
            $('#honorfinal_porc').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }
        if(select_val == "B"){
            $('#honorfinal_porc').prop( "disabled", false );  

            $('#honorinicial_val').prop( "disabled", true );
            $('#honorinicial_data').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }
        if(select_val == "C"){
            $('#honorfinal_porc').prop( "disabled", false );  

            $('#honorinicial_val').prop( "disabled", false );
            $('#honorinicial_data').prop( "disabled", false );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }
        if(select_val == "D"){
            $('#honorfinal_porc').prop( "disabled", true );  

            $('#honorinicial_val').prop( "disabled", true );
            $('#honorinicial_data').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", false );
            $('#honormensal_data').prop( "disabled", false );
            $('#honormensal_parc').prop( "disabled", false );             
        }
        if(select_val == "E"){
            $('#honorfinal_porc').prop( "disabled", true );  

            $('#honorinicial_val').prop( "disabled", true );
            $('#honorinicial_data').prop( "disabled", true );
            $('#honormensal_val').prop( "disabled", true );
            $('#honormensal_data').prop( "disabled", true );
            $('#honormensal_parc').prop( "disabled", true );             
        }                        
      });
      $("#tipo_contratacao").on("select2:select", function (e) { 
        var select_val3 = $(e.currentTarget).val();
        if(select_val3 == "A"){
            $('#data_admissao').prop( "disabled", true );
            $('#data_demissao').prop( "disabled", false );
            $('#data_registro').prop( "disabled", false );              
        }
        if(select_val3 == "B"){
            $('#data_admissao').prop( "disabled", false );
            $('#data_demissao').prop( "disabled", false );
            $('#data_registro').prop( "disabled", true );               
        }
        if(select_val3 == "C"){
            $('#data_admissao').prop( "disabled", false );
            $('#data_demissao').prop( "disabled", false );
            $('#data_registro').prop( "disabled", false );                 
        }                      
      });      
      $("#emp_servico").on("select2:select", function (e) { 
        var select_val2 = $(e.currentTarget).val();
        if(select_val2 == "N"){
            $('#tomadorasim').hide(1000);
                       
        }
        if(select_val2 == "S"){
            $('#tomadorasim').show(1000);               
        }
        });      
});

</script>
@if(config('adminlte.plugins.chartjs'))
    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
    
@endif
<script src="{{ elixir('js/app.js') }}"></script>
@yield('adminlte_js')

</body>
</html>
