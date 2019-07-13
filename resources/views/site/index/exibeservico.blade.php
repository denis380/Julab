@extends('site.index.base')

@section('head')
    <style>
        .person
        {
            width: 40%;
            display: flex;
            margin-left: 45%;
            padding-top: 5%;
        }
    </style>
@endsection

@section('central')

<div class="person">
        <ul class="list-group">
            <li class="list-group-item active"><h3>Seus Serviços</h3></li>
            @foreach ($servicos as $servico)
            <a href="servicoslist/{{ $servico->id }}"><button type="button" class="list-group-item list-group-item-action" href="#">N° : {{ $servico->id }} | {{ $servico->descricao }}</button></a>
            @endforeach
        </ul>
</div>

<div class="person">
    <a class="btn btn-outline-secondary" href="/">Voltar</a>
</div>

@endsection