@extends('site.home.base')

@section('css')
<style>
    .container{
        width: 100%;
    }
</style>
@endsection

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
    
    <form method="POST" action="\validacliente">
        {{ csrf_field() }}
        <?php
            $id_fornecedor = Auth::user()->id;
        ?>
        <input type="hidden" id="id_fornecedor" name="id_fornecedor" value="{{ $id_fornecedor }}">
        <div class="form-group">
          <label >Nome</label>
          <input type="text" name="nome" class="form-control" aria-describedby="emailHelp" onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control">
        </div>
        
        <div class="form-group">
          <label>Documento</label>
          <input type="text" name="documento" class="form-control">
        </div>

        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();">
        </div>
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>bairro</label>
            <input type="text" name="bairro" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>Logradouro</label>
            <input type="text" name="rua" class="form-control" onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>Número</label>
            <input type="text" name="numero" class="form-control">
        </div>

        
        

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection