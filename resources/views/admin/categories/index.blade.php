@extends('adminlte::page')

@section('title', 'Gestion des catégories')

@section('content_header')
    <h1>Liste des catégories</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Nouvelle catégorie</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ Str::limit($category->description, 50) }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette catégorie ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">Aucune catégorie</td></tr>
            @endforelse
        </tbody>
    </table>
@stop
