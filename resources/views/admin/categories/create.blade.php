@extends('adminlte::page')

@section('title', 'Ajouter une catégorie')

@section('content_header')
    <h1>Ajouter une catégorie</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom de la catégorie</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
@stop
