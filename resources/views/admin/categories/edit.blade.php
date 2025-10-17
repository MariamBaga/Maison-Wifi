@extends('adminlte::page')

@section('title', 'Modifier la catégorie')

@section('content_header')
    <h1>Modifier la catégorie</h1>
@stop

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom de la catégorie</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@stop
