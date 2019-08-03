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
        label
        {
            font-weight: bold;
        }
        .p-edit
        {
            font-style: italic;
            font-size: 0.8rem;
            color: gray;
        }
    </style>
@endsection

@section('central')

    <div class="container" style="padding-top:5%">
        
            <p><label>Número: </label> {{ $servico->id }}</p>
            <p><label>Descrição: </label> {{ $servico->descricao }}</p>
            <p><label>Estado do Serviço :</label> {{ $servico->estado }}</p>
            <p><label>Equipamento :</label> {{ $servico->equipamentos->tipo }} &nbsp {{ $servico->equipamentos->fabricante }} &nbsp ({{ $servico->equipamentos->modelo }})</p>
            <p><label>Data Abertura :</label> {{ $servico->created_at->format('d-m-Y') }} &nbsp &nbsp &nbsp
            <label>Data Atendimento :</label> {{ $servico->data_atendimento->format('d-m-Y') }} &nbsp &nbsp &nbsp
            <label>Previsão de entrega :</label> {{ $servico->data_previsao->format('d-m-Y') }}</p>

            <ul class="list-group">
                <li class="list-group-item list-group-item-dark">Notas</li>
                @foreach ($notas as $nota)
                <li class="list-group-item">{{ $nota->nota }}
                    <p class='p-edit'>Editado em: {{ $nota->created_at->format('d-m-Y') }}</p></li>
                @endforeach
              </ul>
    
    </div>
    <div class="person">
        <a class="btn btn-outline-secondary" href="{{route ('/')}}">Voltar</a>
    </div>
@endsection