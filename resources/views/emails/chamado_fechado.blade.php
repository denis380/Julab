<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JuLab</title>
</head>
<body>
    
    <p>Olá, {{ $cliente->nome }}</p>
    <p>A plataforma JuLab informa que seu serviço de N° {{ $servico->id }}, acabou de ser fechado.</p>
    <p>Para mais informações entre em contato com seu fornecedor {{ $fornecedor->name }}, pelo Telefone : {{ $fornecedor->telefone }}</p>


</body>
</html>