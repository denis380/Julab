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
        background-image: url('img/placamae.jpg');
        

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
        
    </style>
@endsection

@section('central')
    <body>

        <div class="bg"></div>
    
        <p class="py-5 text-center">Agora você faz parte da melhor plataforma de gestão de serviços de manutenção. Confirme seu E-mail para continuar.</p>
    
    </body>
@endsection