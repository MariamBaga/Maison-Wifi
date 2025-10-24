@extends('adminlte::page')

@section('title', 'Tableau de bord - Maison WIFI')

@section('content_header')
    <h1 class="fw-bold text-primary text-center mb-4 animate__animated animate__fadeInDown">
        <i class="fas fa-wifi me-2"></i> Tableau de bord - Maison WIFI
    </h1>
@stop

@section('content')
<div class="container py-4">

    {{-- Cartes Statistiques --}}
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow border-0 text-center h-100 animate__animated animate__fadeInUp" style="background: linear-gradient(135deg, #007bff, #00c6ff); color:white;">
                <div class="card-body">
                    <i class="fas fa-box fa-2x mb-2"></i>
                    <h6 class="card-title">Produits</h6>
                    <h2 class="fw-bold">{{ $totalProducts }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 text-center h-100 animate__animated animate__fadeInUp" style="background: linear-gradient(135deg, #28a745, #8fd19e); color:white;">
                <div class="card-body">
                    <i class="fas fa-shopping-cart fa-2x mb-2"></i>
                    <h6 class="card-title">Commandes</h6>
                    <h2 class="fw-bold">{{ $totalOrders }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 text-center h-100 animate__animated animate__fadeInUp" style="background: linear-gradient(135deg, #ffc107, #ffe082); color:white;">
                <div class="card-body">
                    <i class="fas fa-clock fa-2x mb-2"></i>
                    <h6 class="card-title">En attente</h6>
                    <h2 class="fw-bold">{{ $pendingOrders }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow border-0 text-center h-100 animate__animated animate__fadeInUp" style="background: linear-gradient(135deg, #343a40, #6c757d); color:white;">
                <div class="card-body">
                    <i class="fas fa-coins fa-2x mb-2"></i>
                    <h6 class="card-title">Revenus totaux</h6>
                    <h2 class="fw-bold">{{ number_format($totalRevenue, 0, ',', ' ') }} FCFA</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Graphique des commandes --}}
    <div class="card mt-5 shadow border-0 animate__animated animate__fadeInUp">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i> Statistiques mensuelles</h5>
        </div>
        <div class="card-body">
            <canvas id="ordersChart" height="100"></canvas>
        </div>
    </div>

    {{-- Commandes récentes --}}
    <div class="card mt-5 shadow border-0 animate__animated animate__fadeInUp">
        <div class="card-header bg-light d-flex align-items-center">
            <h5 class="mb-0 fw-bold"><i class="fas fa-receipt text-primary me-2"></i> Commandes récentes</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
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
                            <td><strong>{{ $order->id }}</strong></td>
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

    {{-- Produits populaires --}}
    <div class="card mt-5 shadow border-0 animate__animated animate__fadeInUp">
        <div class="card-header bg-light d-flex align-items-center">
            <h5 class="mb-0 fw-bold"><i class="fas fa-fire text-danger me-2"></i> Produits les plus vendus</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach ($topProducts as $product)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset($product->image) }}" width="45" height="45" class="rounded-circle me-3 border">
                            <span class="fw-semibold">{{ $product->name }}</span>
                        </div>
                        <span class="badge bg-primary rounded-pill">{{ $product->orders_count }} ventes</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@stop

@section('css')
    {{-- Animations + Style personnalisé --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background-color: #f7f9fc !important;
        }
        .card {
            border-radius: 15px !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .table th {
            font-weight: 600;
        }
    </style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   const ctx = document.getElementById('ordersChart');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! json_encode($monthNames) !!}, // noms des mois
        datasets: [{
            label: 'Commandes par mois',
            data: {!! json_encode(array_values($ordersByMonth->toArray())) !!},
            borderWidth: 3,
            borderColor: '#007bff',
            backgroundColor: 'rgba(0,123,255,0.1)',
            tension: 0.3,
            fill: true,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false },
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});

</script>
@stop
