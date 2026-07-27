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

    public function increase(CartItem $cartItem)
    {
        abort_if($cartItem->user_id != Auth::id(), 403);

        $cartItem->increment('quantity');

        return back();
    }

    public function decrease(CartItem $cartItem)
    {
        abort_if($cartItem->user_id != Auth::id(), 403);

        if ($cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
        } else {
            $cartItem->delete();
        }

        return back();
    }

    public function destroy(CartItem $cartItem)
    {
        abort_if($cartItem->user_id != Auth::id(), 403);

        $cartItem->delete();

        return back();
    }

    public function clear()
    {
        CartItem::where('user_id', Auth::id())->delete();

        return back();
    }
}