@extends('layouts.app')

@section('content')

<h1>Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Año publicación</label>
        <input type="number" name="published_year" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <select name="category_id" class="form-select" required>
            <option value="" disabled selected>Seleccione una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Autores</label>
        @foreach($authors as $author)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="authors[]" value="{{ $author->id }}" id="author_{{ $author->id }}">
                <label class="form-check-label" for="author_{{ $author->id }}">
                    {{ $author->name }}
                </label>
            </div>
        @endforeach
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection