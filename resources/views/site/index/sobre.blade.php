@extends('site.index.base')

@section('head')
    
@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
            margin-left: 32%;
            background-color: white;
            width: 35%;
            height: 60%;
            transition:all 0.3s ease;
            text-align: center;
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
        .img{
            width: 100%;
        }
        .cabecalho{
            text-align: center;
            padding-left: 3%;
            padding-right: 3%;
            padding-top: 4%;
            margin-bottom: 5%;
            font-size: 2.5rem;
        }
        .footer{
            padding-left: 3%;
            padding-right: 3%;
            padding-top: 10%;
            text-align: center;
            font-style: italic;
        }
        .conteudo{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2.0rem;
        }
        .lista{
            text-align: left !important;
            margin-left: 5%;
        }
    </style>
@endsection
@endsection

@section('central')

<div class="fundo">
    <div class="centro grow">
        <p class="cabecalho">OQUE É JULAB?</p>
        <hr>
        <p class="conteudo">É uma aplicação gratuita que busca auxiliar a gestão de serviços para técnicos em manutenção.</p>
        <p class="conteudo">Viabilizando também o acompanhamento dos serviços para os clientes.</p>
        <p class="cabecalho">BENEFÍCIOS</p>
        <hr>
        <div class="lista">
            <li class="conteudo">Controle de clientes cadastrados por prestador.</li>
            <li class="conteudo">Organização de serviços agendados.</li>
            <li class="conteudo">Interação com o cliente no periodo da manutenção.</li>
        </div>
        <div class="footer">
            <p>Para saber mais</p>
            <a class="btn btn-block btn-lg btn-success" href="{{ url('/register') }}"><b>CADASTRE-SE</b></a>
        </div>

        <div class="footer">
            <p>e veja o passo-a-passo no painel de administração!</p>
        </div>
        
    </div>
    <img src="img/img_sobre.jpg" class="img-fluid" alt="gestao_de_serviços">
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        var logo = $('#logoTipo').hide();
    </script>
@endsection
