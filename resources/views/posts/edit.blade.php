@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Publicación</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('posts.update', $post->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $post->titulo }}" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="5" required>{{ $post->contenido }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen (Banner)</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
