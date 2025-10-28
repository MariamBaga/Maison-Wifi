@extends('layouts2.master')
@section('title', 'Mes commandes')

@section('content')
@include('layouts2.breadcrumb', ['title' => 'Historique de mes commandes'])

<section class="checkout-page">
    <div class="container">
        <h2 class="mb-4 text-center fw-bold">Historique de vos commandes</h2>

        @if($orders->isEmpty())
            <div class="alert alert-info text-center">
                Vous n’avez encore passé aucune commande.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ number_format($order->total, 2, ',', ' ') }} FCFA</td>
                                <td>
                                    @if($order->status === 'pending')
                                        <span class="badge bg-warning text-dark">En attente</span>
                                    @elseif($order->status === 'confirmed')
                                        <span class="badge bg-primary">Confirmée</span>
                                    @elseif($order->status === 'delivered')
                                        <span class="badge bg-success">Livrée</span>
                                    @elseif($order->status === 'cancelled')
                                        <span class="badge bg-danger">Annulée</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Voir
                                    </a>

                                    @if($order->status === 'pending')
                                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-danger"
        onclick="return confirm('Voulez-vous vraiment annuler cette commande ?')">
        <i class="fas fa-times"></i> Annuler
    </button>
</form>

                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>
@endsection
