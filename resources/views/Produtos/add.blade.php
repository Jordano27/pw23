@extends('includes.base')

@section('title', 'Produtos - Adicionar')

@section('content')

    <h2>Adicione seu Produto</h2>
@if ($errors)
    @foreach ($errors->all() as $err)
    {{ $err }}<br>
    @endforeach
@endif

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <form action="{{url()->current()}}" method="post" style="width: 50%; text-align: center; margin-left: 20%; margin-top: 10%;">

        @csrf
        <input type="text" name="name" class="form-control form-control-lg" placeholder="Nome do Produto" value="{{ old('name', $prod->name ?? '')}}"  style=" width: 50%; ">
        <br>
        <input type="number" name="price"class="form-control" id="validationCustom01" step="0.01" placeholder="Preço" value="{{ old('price', $prod->price ?? '')}}" style=" width: 50%;  ">
        <br>
        <input type="number" name="quantily"  class="form-control" id="validationCustom02" placeholder="Quantidade" min="0" value="{{ old('quantily', $prod->quantily ?? '')}}" style=" width: 50%;   ">
       <br>
        <input type="submit" value="Gravar" style="margin-top: 1%; width: 10%;  height: 10%;" class="btn btn-outline-info">
    </form>
@endsection

