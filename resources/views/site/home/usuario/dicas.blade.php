@extends('site.home.base')
@section('base_css')
<style>
    .center{
        margin-left: 40% !important;
    }
    .legenda{
        font-size: 3.0rem;
        color: black;
        font-weight: bolder;
    }
</style>
@endsection
@section('content')<div class="col-md-6">
        <div class="box box-solid center">
          <div class="box-header with-border">
            <h1 class="box-title">COMO COMEÇAR?</h1>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-slide-to="0" data-target="#carousel-example-generic"></li>
                <li class="active" data-slide-to="1" data-target="#carousel-example-generic"></li>
                <li data-slide-to="2" data-target="#carousel-example-generic"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item">
                  <img alt="First slide" src="img/imagem05.png">

                  <div class="carousel-caption">
                    <p class="legenda">Você cadastra o cliente</p>
                  </div>
                </div>
                <div class="item active">
                  <img alt="Second slide" src="img/imagem03.png">

                  <div class="carousel-caption">
                    <p class="legenda">Cadastra o equipamento que vai trabalhar</p>
                  </div>
                </div>
                <div class="item">
                  <img alt="Third slide" src="img/imagem04.png">

                  <div class="carousel-caption">
                    <p class="legenda">Já pode abrir o serviço</p>
                  </div>
                </div>
                <div class="item">
                  <img alt="Third slide" src="img/imagem01.png">

                  <div class="carousel-caption">
                    <p class="legenda">Ficará visível no calendário da Home</p>
                  </div>
                </div>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    
@endsection