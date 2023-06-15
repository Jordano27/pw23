
@extends('includes.base')

@section('title', 'Produtos - Adicionar')

@section('content')

<h2>Apagar Tudo</h2>
<p>Você está prestes a apagar o {{ $prod->name}}.</p>
<p>Tem cereteza que quer fazer isso?</p>

    <form action="{{ route('produtos.deleteForReal', $prod->id) }}" method="post">

        @csrf
        @method('delete')

        <input type="submit" value="Excluir">
    </form>
@endsection
