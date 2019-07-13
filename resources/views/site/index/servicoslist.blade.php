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
    <div class="container" style="padding-top:5%">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Número</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Equipamento</th>
                    <th scope="col">Data Abertura</th>
                    <th scope="col">Data Atendimento</th>
                    <th scope="col">Previsão de entrega</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>{{ $servico->id }}</td>
                    <td>{{ $servico->descricao }}</td>
                    <td>{{ $servico->estado }}</td>
                    <td>{{ $servico->equipamentos->tipo }} &nbsp {{ $servico->equipamentos->fabricante }} &nbsp ({{ $servico->equipamentos->modelo }})</td> 
                    <td>{{ $servico->created_at->format('d-m-Y') }}</td>
                    <td>{{ $servico->data_atendimento->format('d-m-Y') }}</td>
                    <td>{{ $servico->data_previsao->format('d-m-Y') }}</td>
                </tr>                   
                
            </tbody>
        </table>
    </div>

    <div class="person">
        <a class="btn btn-outline-secondary" href="{{route ('/')}}">Voltar</a>
    </div>
@endsection