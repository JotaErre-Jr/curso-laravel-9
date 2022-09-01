@extends('layout.app')

@section('title', 'listagem dos Usuários')

@section('content')
<h1>
    Listagem dos usuários
    (<a href="{{route('users.create')}}">+</a>)
</h1>

<ul>
    @foreach($user as $user)
        <li>
            {{$user->name}} -
            {{$user->email}}
            |<a href="{{route('users.edit', $user->id)}}">Editar</a>
            |<a href="{{route('users.show', $user->id)}}">Detalhes</a>
        </li>

    @endforeach
</ul>
@endsection

