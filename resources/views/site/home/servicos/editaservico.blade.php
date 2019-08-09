@extends('site.home.base')

@section('base_css')
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
            font-size: 1.2rem;
            color: gray;
            padding-top: 1rem;
        }
        .dark
        {
            margin-top: 6%;
            background-color: #B5B5B5;
        }
        .nota
        {
            font-family: sans-serif;
            font-size: 1.5rem;
        }
        
    </style>
@endsection

@section('title', 'AdminLTE')

@section('content_header')
    <div class="container"><h1>Serviço</h1></div>
@stop
]

@section('content')

    <!------------------------------------- Erros ----------------------------------->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('message'))

    <div class="container alert alert-danger">
        {{ session()->get('message') }}
    </div>
    @endif   
<!------------------------------------- Erros ------------------------------------>    

    <div class="container">
        <form method="POST" action="/storeservico/{{ $servico->id }}">
            @csrf
            <p><label for="numero">Número: </label> {{ $servico->id }}</p>
            <p><label for="numero">Descrição: </label> {{ $servico->descricao }}</p>
            <p>
                <label >Data Atendimento: {{ $servico->data_atendimento->format('d/m/Y') }}</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label >Alterar :</label>
                <input type="date" name="data_atendimento" id="data_atendimento">
            </p>
            <p>
                <label>Estado do Serviço :</label>  
                <select name="estado" class="form-control">
                    <option value="aberto">Aberto</option>
                    <option value="atendimento">Em atendimento</option>
                    <option value="fechado">Fechado</option>
                </select>
            </p>
            <p>
                
                <div class="form-group">
                    <label for="nota"> Adicionar Nota : </label>
                    <textarea class="form-control rounded-0" id="nota" name="nota" rows="10"></textarea>
                </div>
            </p>
            

            <button type="submit" class="btn btn-primary" style="margin-top:1.1rem;">Salvar</button>
        </form>

        <ul class="list-group">
            <li class="list-group-item dark">Notas</li>
                @foreach ($notas as $nota)
                    <li class="list-group-item nota">{{ $nota->nota }}
                        <p class='p-edit'>Editado em: {{ $nota->created_at->format('d-m-Y') }}</p>
                    </li>
                 @endforeach
        </ul>
        
        <form method="POST" style="margin-top: 10%" action="/deletaservico/{{ $servico->id }}">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirmar exclusão do serviço?')">EXCLUIR SERVIÇO</button>
            
        </form>
    </div>
@stop
@section('js')
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 @stop