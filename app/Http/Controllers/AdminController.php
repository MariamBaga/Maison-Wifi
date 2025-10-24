<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Statistiques globales
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $totalUsers = User::count();

        // Revenus totaux
        $totalRevenue = Order::where('status', 'completed')->sum('total');

        // Commandes récentes
        $recentOrders = Order::with('products')->latest()->take(5)->get();

        // Produits les plus vendus
        $topProducts = Product::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(5)
            ->get();

        // Commandes par mois pour graphique
        $ordersByMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total', 'month');

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalUsers',
            'totalRevenue',
            'recentOrders',
            'topProducts',
            'ordersByMonth'
        ));
    }
}
