@extends('includes.base')

@section('title', 'Produtos')

@section('content')
    <p>Produtos funfa</p>
    <a href="{{ route('produtos.add') }}">Adiconar Produto</a>
@endsection
