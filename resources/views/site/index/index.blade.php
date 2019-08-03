@extends('site.index.base')

@section('central')
    <!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Central-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-normal">JuLab</h1>
      <p class="lead font-weight-normal">Seu gerenciador de serviços em manutenção eletrônica.</p>
      <a class="btn btn-outline-secondary" href="{{ url('/register') }}">Cadastre-se</a>
    </div>
    <div class="product-device box-shadow d-none d-md-block"></div>
    <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
  </div>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Central-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->  

@if ($errors->any())
<div class="container alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(session()->has('message'))

    <div class="container alert alert-danger">
        {{ session()->get('message') }}
    </div>
@endif    
<div class="container">
<p class="lead font-weight-normal">Verifique a situação do seu serviço</p>
<form action="{{url('meuservico')}}">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nome Cliente: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" style="width: 30%">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-outline-secondary">Pesquisar</button>
    </div>
  </div>
</form>
</div>
@endsection