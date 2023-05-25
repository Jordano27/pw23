<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('includes.base')

    @section('title', 'Título Joia')
    
    @section('content')
    <p>este é meu primeiro arquivo blade</p>
    <p>estou emocionado 😁</p>
    <p>minha primeira variavel que veio de longe: {{ $valor_da_controller }}</p>
    @endsection
</body>
</html>
