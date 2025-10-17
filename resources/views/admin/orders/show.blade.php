@extends('adminlte::page')

@section('title', 'Détails de la commande')

@section('content_header')
    <h1>Détails Commande #{{ $order->id }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Client :</strong> {{ $order->user ? $order->user->name : $order->guest_name }}</p>
            <p><strong>Email :</strong> {{ $order->user ? $order->user->email : $order->guest_email }}</p>
            <p><strong>Téléphone :</strong> {{ $order->phone ?? $order->guest_phone }}</p>
            <p><strong>Adresse :</strong> {{ $order->address ?? $order->guest_address }}</p>
            <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>

            <h4>Produits</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ number_format($product->pivot->price, 2, ',', ' ') }} FCFA</td>
                            <td>{{ number_format($product->pivot->price * $product->pivot->quantity, 2, ',', ' ') }} FCFA</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Total : {{ number_format($order->total, 2, ',', ' ') }} FCFA</h4>

            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-3">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-md-4">
                        <select name="status" class="form-control">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="confirmed" {{ $order->status === 'confirmed' ? 'selected' : '' }}>Confirmée</option>
                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Annulée</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success">Mettre à jour</button>
                    </div>
                </div>
            </form>

            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary mt-3">Retour</a>
        </div>
    </div>
@stop
