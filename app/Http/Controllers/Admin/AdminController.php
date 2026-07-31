<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $total_users = User::count() ;
        $total_products = Product::count() ;
        $total_reviews = Review::count() ;
        $total_orders = Order::count() ;
        $pendingOrders = Order::where('status', 'pending')->get()->count();
        $companyRating = number_format(Review::avg('rating') ?? 0, 1);

        return view('admin.dashboard', [
            'total_users' => $total_users,
            'total_Products' => $total_products,
            'total_reviews' => $total_reviews,
            'total_orders' => $total_orders,
            'pendingOrders' => $pendingOrders,
            'companyRating' => $companyRating,
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.dashboard')->with('success', 'Logged out successfully.');
    }
}