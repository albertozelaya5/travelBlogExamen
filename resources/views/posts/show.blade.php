@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->titulo }}</h2>
        <p>{{ $post->contenido }}</p>
        <img src="{{ asset('storage/' . $post->image) }}" alt="Imagen de la publicación" style="width:100%">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver al Listado</a>
    </div>
@endsection

