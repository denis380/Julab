@extends('adminlte::page')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="POST" action="\salvacliente/{{ $cliente->id }}">
        {{ csrf_field() }}

        <div class="form-group">
          <label >Nome</label>
        <input type="text" name="nome" class="form-control" aria-describedby="emailHelp" onChange="javascript:this.value=this.value.toUpperCase();" value="{{ $cliente->nome }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" value="{{ $cliente->email }}">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}">
        </div>
        
        <div class="form-group">
          <label>Documento</label>
          <input type="text" name="documento" class="form-control" value="{{ $cliente->documento }}">
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" value="{{ $cliente->estado }}">
        </div>
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" value="{{ $cliente->cidade }}">
        </div>

        <div class="form-group">
            <label>bairro</label>
            <input type="text" name="bairro" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" value="{{ $cliente->bairro }}">
        </div>

        <div class="form-group">
            <label>Logradouro</label>
            <input type="text" name="rua" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();" value="{{ $cliente->rua }}">
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" name="numero" class="form-control" value="{{ $cliente->numero }}">
        </div>

        
        

        
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection