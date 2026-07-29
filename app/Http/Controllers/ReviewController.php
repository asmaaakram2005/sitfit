<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|max:1000',
        ]);

        $userId = Auth::id();

        // الـ Migration فيه Unique constraint بين user_id و product_id
        // الأفضل نستخدم updateOrCreate عشان لو قيم المنتج قبل كده يتعدل التقييم بدل ما يضرب Exception
        Review::updateOrCreate(
            [
                'user_id'    => $userId,
                'product_id' => $request->product_id,
            ],
            [
                'rating'  => $request->rating,
                'comment' => $request->comment,
            ]
        );

        return back()->with('success', 'Thank you! Your review has been submitted successfully.');
    }
}
