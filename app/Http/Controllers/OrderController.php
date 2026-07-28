<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {   
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $orders = $user->orders()
            ->with('orderItems')
            ->latest()
            ->get();

        return view('profile.orders', compact('orders'));
    }
}