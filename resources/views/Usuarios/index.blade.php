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

    <form action="{{ route('usuarios')}}" method="post" style="display: flex; justify-content:center; margin-top: 10%; margin-right: 45%;">
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
        <th>Email</th>
        <th>Senha</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>

    @foreach ($users as $user )
        <tr>
            <td><a href="{{ route('usuarios.view', $user->id) }}" style="text-decoration: none;">{{ $user->name }}</a></td>
            <td><a href="{{ route('usuarios.view', $user->id) }}" style="text-decoration: none;">{{ $user->email }}</a></td>
            <td><a href="{{ route('usuarios.view', $user->id) }}" style="text-decoration: none;">🔐</a></td>
            <td ><a href="{{ route('usuarios.edit', $user->id) }}" style="text-decoration: none;">✏️</a></td>
            <td ><a href="{{ route('usuarios.delete', $user->id) }}" style="text-decoration: none;">🗑️</a></td>
        </tr>
    @endforeach

</table>



<br>
    <a style="margin-left:20%; " class="btn btn-outline-info" href="{{ route('usuarios.add') }}">Adiconar Usuario</a>
@endsection
