
@extends('includes.base')

@section('title', 'Usuarios - Adicionar')

@section('content')

<h2>Apagar Tudo</h2>
<p>Você está prestes a apagar o(a){{ $user->name}}.</p>
<p>Tem cereteza que quer fazer isso?</p>

    <form action="{{ route('usuarios.deleteForReal', $user->id) }}" method="post">

        @csrf
        @method('delete')

        <input type="submit" value="Excluir">
    </form>
@endsection
