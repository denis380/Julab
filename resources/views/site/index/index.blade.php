@extends('site.index.base')

@section('head')
    <style>
        body, html 
        {
            height: 100%;
        }
        .bg 
        {
        /* The image used */
        background-image: url('img/bg-index.jpg');

        /* Full height */
        height: 400px;
        
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        font-weight: bolder;
        }
        .div-centro
        {
          margin-top: 3%;
        }
        .txt
        {
          -webkit-text-stroke-width: 1px;
          -webkit-text-stroke-color: #000;
        }
        
        .texto-index{
          position: absolute;
          margin-left: 40%;
          padding-top: 5%;
          margin-right: 35%;
        }
        .lead{
          font-size: 2.0rem;
        }
        @media only screen and (max-width: 500px) {
          .bg{ 
            display: none !important; 
          }
        }
    
    </style>
@endsection

@section('central')
    <!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=Central-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
    
    
     
<div class="position-relative overflow-hidden text-center bg-light flex-box">
  
  <div class="bg flex-box">
  <div class="texto-index">
      <h1 class="display-4 font-weight-normal txt" style="font-size:4rem">JuLab</h1>
      <p class="lead font-weight-normal txt" style="font-size:1.7rem">Seu gerenciador de serviços em manutenção eletrônica.</p>
      <a class="btn btn-block btn-lg btn-outline" href="{{ url('/register') }}"><b>CADASTRE-SE</b></a>
    </div>
    <div class="product-device box-shadow d-none d-md-block"></div>
    <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
    <div class="col-md-5 p-lg-5 mx-auto my-5">
    
  </div>
  </div>
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
<div class="container div-centro">
<p class="lead font-weight-bold">Verifique a situação do seu serviço</p>
<form action="{{url('meuservico')}}">
  <div class="form-group row">
    <label class="col-sm-2">Nome Cliente: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nome" placeholder="Digite seu nome completo" style="width: 50%">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-secondary">Pesquisar  <span class="icon fa fa-search"></span></button>
    </div>
  </div>
</form>

</div>
@endsection