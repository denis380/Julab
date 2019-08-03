@extends('site.home.base')

@section('css')
    <style>
        
        .table .thead-dark th 
        {
            color: #fff;
            background-color: #212529;
            border-color: #32383e;            
        }        
    </style>
@stop

@section('title', 'AdminLTE')

@section('content_header')
    <div class="container">
        <h1 >Clientes</h1>
    </div>
@stop

@section('content')
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Documento</th>
                <th scope="col">Endereço</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)  
                <tr>
                <th scope="row">{{ $cliente->id }}</th>
                <th scope="row">{{ $cliente->nome }}</th>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->documento }}</td>
                <td>Logradouro: {{ $cliente->rua }}, N° {{ $cliente->numero }} - {{ $cliente->bairro }}</td>
                <td>
                    <a class="btn btn-success" href="/editacliente/{{ $cliente->id }}">Editar</a>
                    <a class="btn btn-danger" href="/excluicliente/{{ $cliente->id }}" onclick="return confirm('Tem certeza que deseja excluir esse cliente?')">Excluir</a>
                </td>
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