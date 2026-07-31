<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;


class ReviewController extends Controller
{
    public function index()
    {
         $reviews = Review::with(['user', 'product'])->get();
        return view('admin.reviews.index',[
            'reviews' => $reviews
        ]);
    }
}