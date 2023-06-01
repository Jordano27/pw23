@extends('includes.base')

@section('title', 'Produtos')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<table border="1" style="width: 80%; text-align: center; margin-left: 10%; margin-top: 10%;"  class="table table-dark table-striped"  >
    <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>

    @foreach ($prods as $prod )
        <tr>
            <td>{{ $prod->name }}</td>
            <td>R$ {{ number_format($prod->price, 2, ',', '.') }}</td>
            <td>{{ $prod->quantily }}</td>
        </tr>
    @endforeach
</table>
<br>
    <a style="margin-left:1%; " class="btn btn-outline-info" href="{{ route('produtos.add') }}">Adiconar Produto</a>
@endsection
