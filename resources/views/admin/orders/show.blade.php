@extends('adminlte::page')

@section('title', 'Détail de la commande')

@section('content_header')
    <h1 class="fw-bold text-primary">
        <i class="fas fa-receipt me-2"></i> Détail de la commande #{{ $order->id }}
    </h1>
@stop

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h5 class="fw-bold mb-3">Informations sur la commande</h5>
        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</li>
            <li class="list-group-item"><strong>Total :</strong> {{ number_format($order->total, 2, ',', ' ') }} FCFA</li>
            <li class="list-group-item"><strong>Statut :</strong>
                <span class="badge
                    @if($order->status === 'pending') bg-warning text-dark
                    @elseif($order->status === 'confirmed') bg-primary
                    @elseif($order->status === 'delivered') bg-success
                    @elseif($order->status === 'cancelled') bg-danger
                    @endif">
                    {{ ucfirst($order->status) }}
                </span>
            </li>
            <li class="list-group-item"><strong>Méthode de paiement :</strong> {{ $order->payment_method }}</li>
            <li class="list-group-item"><strong>Client :</strong>
                {{ $order->user->name ?? $order->guest_name ?? 'Invité' }}<br>
                <small>{{ $order->user->email ?? $order->guest_email ?? '' }}</small>
            </li>
            <li class="list-group-item"><strong>Téléphone :</strong> {{ $order->phone ?? $order->guest_phone }}</li>
            <li class="list-group-item"><strong>Adresse :</strong> {{ $order->address ?? $order->guest_address }}</li>
        </ul>

        <h5 class="fw-bold mb-3">Produits de la commande</h5>
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
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->pivot->price, 2, ',', ' ') }} FCFA</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->pivot->price * $product->pivot->quantity, 2, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end mt-3">
            <h4>Total : <span class="text-success">{{ number_format($order->total, 2, ',', ' ') }} FCFA</span></h4>
        </div>

        <div class="mt-4">
            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-inline">
                @csrf
                <label for="status" class="fw-bold me-2">Changer le statut :</label>
                <select name="status" id="status" class="form-select d-inline w-auto">
                    <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>En attente</option>
                    <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                    <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Livrée</option>
                    <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Annulée</option>
                </select>
                <button type="submit" class="btn btn-primary ms-2">
                    <i class="fas fa-save"></i> Mettre à jour
                </button>
            </form>

            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary ms-3">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
    </div>
</div>
@stop
