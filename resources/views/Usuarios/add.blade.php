@extends('includes.base')

@section('title', 'Usuarios - Adicionar')

@section('content')

    <h2>Adicione seu usuario</h2>
@if ($errors)
    @foreach ($errors->all() as $err)
    {{ $err }}<br>
    @endforeach
@endif

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <form action="{{url()->current()}}" method="post" style="width: 50%; text-align: center; margin-left: 20%; margin-top: 10%;">

        @csrf
        <input type="text" name="name" class="form-control form-control-lg" placeholder="Nome do Usuario" value="{{ old('name', $user->name ?? '')}}"  style=" width: 50%; ">
        <br>
        <input type="number" name="email"class="form-control" id="validationCustom01" step="0.01" placeholder="Email" value="{{ old('price', $user->email ?? '')}}" style=" width: 50%;  ">
        <br>
        <input type="number" name="password"  class="form-control" id="validationCustom02" placeholder="Quantidade" min="0" value="{{ old('quantily', $user->pasword ?? '')}}" style=" width: 50%;   ">
       <br>
        <input type="submit" value="Gravar" style="margin-top: 1%; width: 10%;  height: 10%;" class="btn btn-outline-info">
    </form>
@endsection

