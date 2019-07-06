@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <style>
        .container{
            height: 1300px;
            width: 1300px;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')

    <div class="container">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
    </div>
   
    
@endsection

@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
@endsection