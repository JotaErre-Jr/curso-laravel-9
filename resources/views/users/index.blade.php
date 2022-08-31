@extends('layout.app')

@section('title', 'listagem dos Usuários')

@section('content')
<h1>Listagem dos usuários</h1>

<ul>
    @foreach($user as $user)
        <li>
            {{$user->name}} -
            {{$user->email}}
            |<a href="{{route('users.show', $user->id)}}">Detalhes</a>
        </li>

    @endforeach
</ul>
@endsection

