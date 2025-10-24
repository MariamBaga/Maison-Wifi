@extends('adminlte::page')

@section('title', 'Tableau de bord')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 fw-bold text-primary">Tableau de bord - Maison WIFI</h1>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Produits</h5>
                    <h2>{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Commandes</h5>
                    <h2>{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">En attente</h5>
                    <h2>{{ $pendingOrders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Revenus totaux</h5>
                    <h2>{{ number_format($totalRevenue, 0, ',', ' ') }} FCFA</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Commandes récentes -->
    <div class="card mt-4">
        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold">Commandes récentes</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name ?? $order->guest_name ?? 'Invité' }}</td>
                            <td>{{ number_format($order->total, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <span class="badge bg-{{ $order->status === 'completed' ? 'success' : ($order->status === 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Produits populaires -->
    <div class="card mt-4">
        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold">Produits les plus vendus</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($topProducts as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <img src="{{ asset($product->image) }}" width="40" height="40" class="rounded me-2">
                            {{ $product->name }}
                        </div>
                        <span class="badge bg-primary">{{ $product->orders_count }} ventes</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
