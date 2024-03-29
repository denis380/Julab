@extends('site.home.base')

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
    <form method="POST" action="\salvaequipamento/{{ $equipamento->id }}">
        {{ csrf_field() }}

        <div class="form-group">
          <label >Tipo</label>
        <input type="text" value="{{ $equipamento->tipo }}" name="tipo" class="form-control" aria-describedby="emailHelp" placeholder="Ex: Notbook , Monitor, TV ..." onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
          <label>Fabricante</label>
          <input type="text" value="{{ $equipamento->fabricante }}" name="fabricante" class="form-control"  placeholder="Ex: HP, Samgsung, Dell ... " onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>Modelo</label>
            <input type="text" value="{{ $equipamento->modelo }}" name="modelo" class="form-control"  placeholder="Ex: 650G1, Galaxy S8, LT13B ... " onChange="javascript:this.value=this.value.toUpperCase();">
        </div>

        <div class="form-group">
            <label>Observações</label>
            <input type="text" value="{{ $equipamento->obs }}" name="obs" class="form-control"  placeholder="Observações sobre o produto.">
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection