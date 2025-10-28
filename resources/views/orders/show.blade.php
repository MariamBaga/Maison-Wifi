@extends('layouts2.master')
@section('title', 'Détail de la commande')

@section('content')
@include('layouts2.breadcrumb', ['title' => 'Détail de la commande'])

<section class="checkout-page">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Détails de la commande #{{ $order->id }}</h2>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="fw-bold text-primary mb-3">Informations de la commande</h5>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Date :</strong></div>
                    <div class="col-md-8">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Total :</strong></div>
                    <div class="col-md-8">{{ number_format($order->total, 2, ',', ' ') }} FCFA</div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Statut :</strong></div>
                    <div class="col-md-8">
                        @if($order->status === 'pending')
                            <span class="badge bg-warning text-dark">En attente</span>
                        @elseif($order->status === 'confirmed')
                            <span class="badge bg-primary">Confirmée</span>
                        @elseif($order->status === 'delivered')
                            <span class="badge bg-success">Livrée</span>
                        @elseif($order->status === 'cancelled')
                            <span class="badge bg-danger">Annulée</span>
                        @endif
                    </div>
                </div>

                @if($order->address)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Adresse de livraison :</strong></div>
                    <div class="col-md-8">{{ $order->address }}</div>
                </div>
                @endif

                @if($order->phone)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Téléphone :</strong></div>
                    <div class="col-md-8">{{ $order->phone }}</div>
                </div>
                @endif

                @if($order->payment_method)
                <div class="row mb-2">
                    <div class="col-md-4"><strong>Méthode de paiement :</strong></div>
                    <div class="col-md-8">{{ ucfirst($order->payment_method) }}</div>
                </div>
                @endif
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold text-primary mb-3">Produits commandés</h5>

                @if($order->products->isEmpty())
                    <div class="alert alert-warning">Aucun produit trouvé pour cette commande.</div>
                @else
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix unitaire</th>
                                    <th>Quantité</th>
                                    <th>Sous-total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if($product->image)
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="me-2 rounded" width="60">
                                                @endif
                                                <span>{{ $product->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ number_format($product->pivot->price, 2, ',', ' ') }} FCFA</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>{{ number_format($product->pivot->price * $product->pivot->quantity, 2, ',', ' ') }} FCFA</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-end mt-3">
                        <h5>Total : <strong class="text-success">{{ number_format($order->total, 2, ',', ' ') }} FCFA</strong></h5>
                    </div>
                @endif
            </div>
        </div>

        <div class="mt-4 text-center">
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Retour à mes commandes
            </a>

            @if($order->status === 'pending')
                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Voulez-vous vraiment annuler cette commande ?')">
                        <i class="fas fa-times"></i> Annuler la commande
                    </button>
                </form>
            @endif
        </div>
    </div>
</section>
@endsection
