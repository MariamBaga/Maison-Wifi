<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Liste toutes les commandes pour l'admin
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    // Affiche le détail d’une commande
    public function show($id)
    {
        $order = Order::with('products', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Mettre à jour le statut d’une commande
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->route('admin.orders.index')->with('success', 'Statut de la commande mis à jour.');
    }

    // Supprimer une commande
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Commande supprimée.');
    }
}
