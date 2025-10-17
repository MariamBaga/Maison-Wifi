@extends('adminlte::page')

@section('title', 'Commandes')

@section('content_header')
    <h1>Commandes - Admin</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if($orders->count())
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Client</th>
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
                                <td>{{ $order->user ? $order->user->name : $order->guest_name }}</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ number_format($order->total, 2, ',', ' ') }} FCFA</td>
                                <td>
                                    @if($order->status === 'pending')
                                        <span class="badge bg-warning">En attente</span>
                                    @elseif($order->status === 'cancelled')
                                        <span class="badge bg-danger">Annulée</span>
                                    @else
                                        <span class="badge bg-success">Confirmée</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-info">Voir</a>
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette commande ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            @else
                <p>Aucune commande trouvée.</p>
            @endif
        </div>
    </div>
@stop
