@extends('site.home.base')

@section('css')
    <style>
        
        .table .thead-dark th {
            color: #fff;
            background-color: #212529;
            border-color: #32383e;
            
        }  
    </style>
@stop

@section('title', 'AdminLTE')

@section('content_header')
  <div class="container">
  <h1>Lista de Servicos</h1>
  </div>
@stop

@section('content')
    <div class="container">
    <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Número</th>
                <th scope="col">Descrição</th>
                <th scope="col">Estado</th>
                <th scope="col">Equipamento</th>
                <th scope="col">Cliente</th>
                <th scope="col">Data Abertura</th>
                <th scope="col">Data Atendimento</th>
                <th scope="col">Data Entrega</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($servicos as $servico)
            <tr>
                <td><a href="/editaservico/{{ $servico->id }}">{{ $servico->id }}</a></td>
                <td>{{ $servico->descricao }}</td>
                <td>{{ $servico->estado }}</td>
                <td>{{ $servico->equipamentos->tipo }} &nbsp {{ $servico->equipamentos->fabricante }} &nbsp ({{ $servico->equipamentos->modelo }})</td> 
                <td>{{ $servico->cliente->nome }}</td>
                <td>{{ $servico->created_at->format('d-m-Y') }}</td>
                <td>{{ $servico->data_atendimento->format('d-m-Y') }}</td>
                <td>{{ $servico->data_previsao->format('d-m-Y') }}</td>
                <!--<td><a href="/editaequip/" class="btn btn-success">Editar</a><a href="/excluiequipamento/
                " class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esse equipamento?')">Excluir</a></td>
                -->
            </tr>
                
                @endforeach
              
            </tbody>
          </table>
    </div>
@stop
@section('js')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 @stop