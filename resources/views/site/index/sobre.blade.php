@extends('site.index.base')

@section('head')
    
    <style>
        .bg{
            background-image: url('img/bg-index.jpg');
        }
    </style>
@endsection

@section('central')
<img src="img/img_sobre.jpg" class="img-fluid" alt="Responsive image">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        var logo = $('#logoTipo').hide();
    </script>
@endsection