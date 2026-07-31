<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {   $orders = Order::all();
        return view('admin.orders.index',[
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
        // جلب العناصر والمنتج المرتبط بكل عنصر
        $order->load('orderItems.product');

        return view('admin.orders.show', [
            'order' => $order,
        ]);
    }
}