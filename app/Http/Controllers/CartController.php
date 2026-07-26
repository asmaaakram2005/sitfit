<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::where('user_id', Auth::id())
            ->with('product.images')
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    public function store(Product $product)
    {
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {

            $cartItem->increment('quantity');

        } else {

            CartItem::create([
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);

        }

        return redirect()->route('cart.index');
    }
}