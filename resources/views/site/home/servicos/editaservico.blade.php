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
    <div class="container"><h1>Serviço</h1></div>
@stop
]

@section('content')
    <div class="container">
        <form method="POST" action="/storeservico/{{ $servico->id }}">
            @csrf
            <p><label for="numero">Número: </label> {{ $servico->id }}</p>
            <p><label for="numero">Descrição: </label> {{ $servico->descricao }}</p>
            <p>
                <label >Data Atendimento: {{ $servico->data_atendimento->format('d/m/Y') }}</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label >Alterar :</label>
                <input type="date" name="data_atendimento" id="data_atendimento" value="{{ $servico->data_atendimento->format('d/m/Y') }}">
            </p>
            <p>
                <label>Estado do Serviço :</label>  
                <select name="estado" class="form-control">
                    <option value="aberto">Aberto</option>
                    <option value="atendimento">Em atendimento</option>
                    <option value="fechado">Fechado</option>
                </select>
            </p>
            <p><label for="nota"> Adicionar Nota : <input type="text" name="nota"></label></p>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
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