@extends('includes.base')

@section('title', 'Produtos - Adicionar')

@section('content')
<div class="">
    <h2>Adicione seu Produto</h2>
@if ($errors)
    @foreach ($errors->all() as $err)
    {{ $err }}<br>
    @endforeach
@endif
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <form action="{{ route('produtos.add') }}" method="post" style="width: 50%; text-align: center; margin-left: 35%; margin-top: 10%;">
        @csrf
        <input type="text" name="name" class="form-control form-control-lg" placeholder="Nome do Produto" value="{{ old('name')}}"  style=" width: 50%; ">
        <br>
        <input type="number" name="price"class="form-control" id="validationCustom01" step="0.01" placeholder="Preço" style=" width: 20%;  margin-left: 15%;  ">
        <br>
        <input type="number" name="quantily"  class="form-control" id="validationCustom02" placeholder="Quantidade" min="0" value=" {{ old('quantily') }} " style=" width: 20%;  margin-left: 15%; ">
       <br>
        <input type="submit" value="Gravar" style="margin-left: -50%; width:" class="btn btn-outline-info">
    </form>
@endsection

