<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $cartItems = CartItem::where('user_id', $user->id)
            ->with('product.images')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $address = Address::where('user_id', $user->id)->first();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = 0;

        $tax = 0;

        $total = $subtotal + $shipping + $tax;

        return view('checkout.index', [
            'cartItems' => $cartItems,
            'address'   => $address,
            'subtotal'  => $subtotal,
            'shipping'  => $shipping,
            'tax'       => $tax,
            'total'     => $total,
        ]);
    }
}