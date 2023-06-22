@extends('includes.base')

@section('title', 'Produtos')

@section('content')

@if(session('sucesso'))
    <div style="background-color: greenyellow";>
       {{(session('sucesso'))}}
    </div>
@endif
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

    <form action="{{ route('produtos')}}" method="post" style="display: flex; justify-content:center; margin-top: 10%; margin-right: 45%;">
            @csrf
        <input type="text" name="busca" id="">
        <select name="ord" id="">
            <option value="asc">Crescente</option>
            <option value="desc">Decrescente</option>
        </select>
          <input type="submit" value="Buscar">
    </form>

<table border="1" style="width: 50%; text-align: center; margin-left: 20%; margin-top: 2%;"  class="table table-dark table-striped"  >
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    @foreach ($prods as $prod )
        <tr>
            <td><a href="{{ route('produtos.view', $prod->id) }}" style="text-decoration: none;">{{ $prod->name }}</a></td>
            <td>R$ {{ number_format($prod->price, 2, ',', '.') }}</td>
            <td>{{ $prod->quantily }}</td>
            <td ><a href="{{ route('produtos.edit', $prod->id) }}" style="text-decoration: none;">✏️</a></td>
            <td ><a href="{{ route('produtos.delete', $prod->id) }}" style="text-decoration: none;">🗑️</a></td>
        </tr>
    @endforeach
</table>
<br>
    <a style="margin-left:20%; " class="btn btn-outline-info" href="{{ route('produtos.add') }}">Adiconar Produto</a>
@endsection
