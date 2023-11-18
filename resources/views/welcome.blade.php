@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Explora Nuestras Publicaciones</h2>

        @foreach ($posts as $post)
            <div class="card mb-3">
                @if ($post->image)
                    <img style="max-height: 200px; width: auto;object-fit: cover; height: 100%;" src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Banner de Publicación"> @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->titulo }}</h5>
                    <p class="card-text">{{ Str::limit($post->contenido, 150) }}</p>
                    <a href="{{ route('public.posts.show', $post->id) }}" class="btn btn-info">Leer Más</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
