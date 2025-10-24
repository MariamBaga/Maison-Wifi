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

        // Commandes par mois (compatible tous moteurs SQL)
        $ordersByMonth = Order::all()
            ->groupBy(function($order) {
                // Retourne le mois en entier (1 à 12)
                return Carbon::parse($order->created_at)->format('m');
            })
            ->map(function($orders) {
                return $orders->count();
            })
            ->sortKeys();

        // Pour les labels du graphique (Janvier, Février…)
        $monthNames = collect($ordersByMonth->keys())
            ->map(function($month) {
                return Carbon::create()->month($month)->format('F'); // Nom du mois en anglais
            });

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalUsers',
            'totalRevenue',
            'recentOrders',
            'topProducts',
            'ordersByMonth',
            'monthNames'
        ));
    }
}
