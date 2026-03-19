<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Admins only');
        }

        $totalCustomers = User::where('role', 'customer')->count();
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'Pending')->count();
        $lowStockProducts = Product::where('stockQuantity', '<=', 5)->count();

        return view('admin-dashboard', compact(
            'totalCustomers',
            'totalOrders',
            'pendingOrders',
            'lowStockProducts'
        ));
    }
}