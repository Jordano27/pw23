@extends('includes.base')

@section('title', 'Produtos - Adicionar')

@section('content')

    <h2>Adicione seu Produto</h2>
@if ($errors)
    @foreach ($errors->all() as $err)
    {{ $err }}<br>
    @endforeach
@endif

    <form action="{{ route('produtos.add') }}" method="post">
        @csrf
        <input type="text" name="name" id="" placeholder="Nome do Produto">
        <br>
        <input type="number" name="price" id="" step="0.01" placeholder="Preço">
        <br>
        <input type="number" name="quantily" id="" placeholder="Quantidade" min="0">
        <hr width="30%" align="left">
        <input type="submit" value="Gravar">
    </form>
@endsection
