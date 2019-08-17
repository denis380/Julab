@extends('site.home.base')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        .container{
            width: 100%;
            height: 80%;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
    </div>
    
@endsection

<!-- Só funcionou copiando o CDN do Bootstrap no Head do master.blade.php do Admin LTE -->
@section('js')
    <script src="/js/lib/moment.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <script src="/js/pt-br.js"></script>

    <script>
        var navbar = document.querySelector('.nav.navbar-nav');
        var li = document.createElement('li');
        var a = document.createElement('a');
        var i = document.createElement('i');

        i.innerHTML = "Olá <?php 
                        $nome = Auth::user()->name;
                        $pnome = explode(" ", $nome);
                        echo $pnome[0];
                    ?>";
        a.appendChild(i);
        li.appendChild(a);
        navbar.appendChild(li); 
    </script>
@endsection