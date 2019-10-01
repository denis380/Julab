@extends('site.index.base')

@section('head')
    
    <style>
        .bg{
            background-image: url('img/bg-index.jpg');
        }
        .fundo{
            position: relative !important;
        }
        .centro{
            position: absolute !important;
            margin-top: 10%;
            margin-left: 10%;
            background-color: white;
            width: 35%;
            height: 35%;
            transition:all 0.3s ease;
        }
        .grow:hover
        {
        -webkit-transform: scale(1.3);
        -ms-transform: scale(1.3);
        transform: scale(1.3);
        box-shadow:
                1px 1px #696969,
                2px 2px #696969,
                3px 3px #696969;
        }
        .lado{
            position: absolute !important;
            margin-top: 20%;
            margin-left: 53%;
            background-color: white;
            width: 35%;
            height: 35%;
            transition:all 0.3s ease;
        }
        .img{
            width: 100%;
        }
        .cabecalho{
            padding-left: 3%;
            padding-right: 3%;
            padding-top: 4%;
            margin-bottom: 3%;
            font-size: 1.7rem;
        }
        .footer{
            padding-left: 3%;
            padding-right: 3%;
            padding-top: 4%;
            text-align: center;
            font-style: italic;
            font-size: 1.3rem;
        }
        @media only screen and (max-width: 800px) {
          .centro{ 
            height: 60%;
          }
          .cabecalho{
              font-size: 1.0rem;
          }
          .lado{
              height: 60%;
          }
          .img{
              display: none;
          }
        }
    </style>
@endsection

@section('central')
<div class="fundo">
    <div class="centro grow">
        <img src="img/cliente01.png" alt="instrução" class="img">
        <label class="cabecalho">Você só precisa digitar seu nome no campo descrito abaixo que se encontra na pagina <a href="/">HOME.</a> </label>
        <label class="footer">A busca ultiliza o nome com o qual seu prestador o cadastrou , por isso, é importante confirmar os dados na hora do cadastro!</label>
    </div>
    <div class="lado grow">
        <img src="img/cliente02.png" alt="instrução" class="img">
        <label class="cabecalho">Então exibirá todos os serviços cadastrados em seu nome.</label>
        <label class="footer"></label>    
    </div>
    <img src="img/img_cliente.jpg" class="img-fluid img" alt="gestao_de_serviços">
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        var logo = $('#logoTipo').hide();
    </script>
@endsection