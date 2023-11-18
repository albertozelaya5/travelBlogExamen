@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-1">Publicaciones</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Crear Publicación</a>

        @foreach ($posts as $post)
            <div class="card mb-3">
           
                        @if ($post->image)
                <!-- asset permite acceder a los recursos en este caso del filesystem indicandole la URL o ruta del recurso en este caso se concateno la ruta de la carpeta principal con lo obtenido de la BD-->
                <img style="max-height: 200px; width: auto;object-fit: contain; height: 100%;"
                    src="{{ asset('storage/'. $post->image) }}" class="card-img-top pt-2" alt="Banner de Publicación">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->titulo }}</h5>
                    <p class="card-text">{{ Str::limit($post->contenido, 150) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Ver Detalles</a>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Eliminar
                </button>
                <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Desea eliminar este registro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


            </div>
        @endforeach
    </div>
@endsection