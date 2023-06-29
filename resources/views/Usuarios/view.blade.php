@extends('includes.base')

@section('title', 'usuarios - Ver')

@section('content')
    <h2>{{ $user->name }}</h2>
    <p>{{ $user->email }}</p>
    <p>>{{ $user->senha }}</p>

    <p>
        <a href="{{ route('usuarios') }}">Voltar</a>
    </p>
@endsection
