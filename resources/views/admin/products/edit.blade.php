@extends('adminlte::page')

@section('title', 'Modifier un produit')

@section('content_header')
    <h1 class="m-0 text-dark">Modifier le produit : {{ $product->name }}</h1>
@stop

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-primary card-outline shadow-sm">
        <div class="card-header">
            <h3 class="card-title">Formulaire de modification</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nom du produit --}}
                <div class="form-group mb-3">
                    <label for="name">Nom du produit</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Prix --}}
                <div class="form-group mb-3">
                    <label for="price">Prix (FCFA)</label>
                    <input type="number" step="0.01" name="price" id="price"
                           class="form-control @error('price') is-invalid @enderror"
                           value="{{ old('price', $product->price) }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Stock --}}
                <div class="form-group mb-3">
                    <label for="stock">Stock disponible</label>
                    <input type="number" name="stock" id="stock"
                           class="form-control @error('stock') is-invalid @enderror"
                           value="{{ old('stock', $product->stock) }}">
                    @error('stock')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Catégorie --}}
                <div class="form-group mb-3">
                    <label for="category_id">Catégorie</label>
                    <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">-- Sélectionnez une catégorie --</option>
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Image --}}
                <div class="form-group mb-4">
                    <label for="image">Image du produit</label>
                    <input type="file" name="image" id="image"
                           class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($product->image)
                        <div class="mt-3">
                            <p>Image actuelle :</p>
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                 class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    @endif
                </div>

                {{-- Boutons --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Mettre à jour
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@stop
