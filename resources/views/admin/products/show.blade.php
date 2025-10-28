@extends('adminlte::page')

@section('title', 'Détail du produit')

@section('content_header')
    <h1 class="m-0 text-dark">Détails du produit</h1>
@stop

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary card-outline shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    @if($product->image)
                        <div class="text-center mb-3">
                            <img src="{{ asset($product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="img-fluid rounded"
                                 style="max-height: 300px;">
                        </div>
                    @else
                        <div class="text-center text-muted mb-3">
                            <i class="fas fa-image fa-3x"></i>
                            <p>Pas d'image disponible</p>
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Nom</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Catégorie</th>
                            <td>{{ $product->category->name ?? 'Aucune' }}</td>
                        </tr>
                        <tr>
                            <th>Prix</th>
                            <td><strong>{{ number_format($product->price, 2, ',', ' ') }} FCFA</strong></td>
                        </tr>
                        <tr>
                            <th>Stock</th>
                            <td>{{ $product->stock }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $product->description ?? 'Aucune description' }}</td>
                        </tr>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour
                    </a>
                    @role('admin')
                    <div>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Supprimer ce produit ?')">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>

</div>
@stop
