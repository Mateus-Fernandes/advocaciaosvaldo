<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  </head>

  <body>
    <table style="width:100%;">

        <tr>
            <td align="left" style="width: 60%;">
                <h2>Relatório de Acompanhamento Processual</h2>
            </td>        
            <td align="right"><img src="{{ asset('vendor/adminlte/vendor/logopdf.png') }}" alt=""></td>
        </tr>
    </table>
    <div style="width:100%; height:2px; background:#000; display:table;margin-bottom: 20px;"></div>
<table style="border-collapse:collapse;border-spacing:0;table-layout: fixed; width: 100%;font-family: Arial;font-size: 14px;">
<colgroup>
<col style="width: 10.96%">
<col style="width: 20.66%">
<col style="width: 29.08%">
<col style="width: 52.01%">
</colgroup>
<tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
   <tr style="text-align:left;font-family:Arial, sans-serif;font-size:14px;"><th>Dados sobre o Contrato:</th></tr>
   <tr><th></th><th></th></tr>
  <tr style="background: #cecece;"><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left">Código do Contrato</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top">{{$processo[0]->id_contrato}}</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:right;vertical-align:top">Tipo</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top">{{$processo[0]->tipo}}</th>
  </tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr style="text-align:left;font-family:Arial, sans-serif;font-size:14px;"><th>Dados sobre o Cliente:</th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr style="background: #cecece;"><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left">Nome</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top">{{$processo[0]->nome}}</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:right;vertical-align:top">Endereço</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top">{{$processo[0]->endereco}}</th>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Bairro</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">{{$processo[0]->bairro}}</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:right;vertical-align:top;">Cidade</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">{{$processo[0]->cidade}}</td>
  </tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr style="text-align:left;font-family:Arial, sans-serif;font-size:14px;"><th>Dados sobre o Processo:</th></tr>
  <tr><th></th><th></th></tr>
  <tr style="background: #cecece;"><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Número do Processo</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{$processo[0]->num_processo}}</td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Natureza</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{$processo[0]->natureza}}</td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Vara</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{$processo[0]->vara}}</td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Pasta</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{$processo[0]->pasta}}</td>
  </tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr style="text-align:left;font-family:Arial, sans-serif;font-size:14px;"><th>Dados Parte Contrária:</th></tr>
  <tr><th></th><th></th></tr>
  <tr style="background: #cecece;"><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left">Nome</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top">{{$processo[0]->parte_contraria}}</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:right;vertical-align:top">Telefone</th>
    <th style="font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top">{{$processo[0]->pc_telefone}}</th>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Email</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{$processo[0]->pc_email}}</td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Observações</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{$processo[0]->obs}}</td>
  </tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr style="text-align:left;font-family:Arial, sans-serif;font-size:14px;"><th>Histórico de Andamentos:</th></tr>
  <tr><th></th><th></th></tr>
  <tr style="background: #cecece;"><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  <tr><th></th><th></th></tr>
  
  @foreach($processo_andamento as $pro)
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Data e Hora</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{ $pro->datahora}}</td>
  </tr>
  <tr>
    <td style="font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;">Andamento</td>
    <td style="font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:none;border-width:1px;overflow:hidden;word-break:normal;border-color:black;border-color:inherit;text-align:left;vertical-align:top;" colspan="3">{{ $pro->andamento}}  </td>
  </tr>
  <tr><th><hr></th></tr>
  @endforeach

</table>
</body>

</html>
