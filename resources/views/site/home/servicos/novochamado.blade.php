@extends('adminlte::page')
@section('css')
<style>
    .container{
        width: 100%;
    }
</style>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <h1>Novo Serviço</h1>
    <form method="POST" action="\validaservico">
        {{ csrf_field() }}

        <div class="form-group">  
            <label>Equipamento :</label>
            <select name="c_equipamento" class="form-control">
                <option value="0">SELECIONE UM EQUIPAMENTO</option>
                @foreach ($equipamentos as $equipamento)
                <option value="{{ $equipamento->id }}">{{ $equipamento->tipo }}: {{ $equipamento->fabricante }} - {{ $equipamento->modelo }}</option>  
                @endforeach  
            </select>
        </div>

        <div class="form-group">  
            <label>Cliente :</label>
            <select name="id_cliente" class="form-control">
                <option value="0">SELECIONE UM CLIENTE</option>
                @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>  
                @endforeach  
            </select>
        </div>        

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" class="form-control">
        </div>
        
        <div class="form-group">
          <label>Previsão de Atendimento</label>
          <input type="date" name="data_atendimento" class="form-control">
        </div>

        <div class="form-group">
            <label>Previsão de Entrega</label>
            <input type="date" name="data_previsao" class="form-control">
        </div>
        <div class="form-group">
            
                <label>Estado do Serviço :</label>  
                <select name="estado" class="form-control">
                    <option value="aberto">Aberto</option>
                    <option value="atendimento">Em atendimento</option>
                    <option value="fechado">Fechado</option>
                </select>
            
        </div>

        
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
</div>
@endsection