@extends('base')

@section('title', 'Home')

@section('sidebar')
    @parent
    <p>Más contenido del sidebar</p>
@endsection

@section('content')
    @if(isset($user))
        {{ $user->nameAndEmail }}
    @else
        No existe el usuario
    @endif

    <p>{{ appName() }}</p>

    <h2 class="text-center text-muted">Listado de Posts</h2>

    @forelse($user->posts as $post)
        <p>Título: {{ $post->title }}, Body: {{ $post->body }}</p>
    @empty
        <div class="alert alert-danger">No hay posts para este usuario</div>
    @endforelse
@endsection