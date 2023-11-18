@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Publicación</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('posts.store') }}"   enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Imagen (Banner)</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
        <label for="tags">Tags:</label>
        <input type="text" name="tags" id="tags" class="form-control" data-role="tagsinput">
    </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

    </div>
    <script>
    // Configuración de Typeahead
        $(document).ready(function() {
            $('#tags').typeahead({
                source: function(query, process) {
                    // Hacer una solicitud AJAX para obtener sugerencias de tags desde el servidor
                    $.ajax({
                        url: "{{ route('tags.suggest') }}", // Ruta a tu endpoint de sugerencias
                        type: 'GET',
                        data: { query: query },
                        dataType: 'json',
                        success: function(data) {
                            process(data);
                        }
                    });
                }
            });
        });
    </script>
@endsection
