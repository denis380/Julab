@extends('adminlte::page')

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
@endsection