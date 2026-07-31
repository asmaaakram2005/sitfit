<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products with images, average rating, and review count.
     */
    public function index()
    {
        // جلب المنتجات مع الصور + حساب متوسط التقييم + إجمالي عدد التقييمات لكل منتج
        $products = Product::withAvg('reviews', 'rating')
                           ->withCount('reviews')
                           ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product with its images, reviews, average rating, and review count.
     */
    public function show(Product $product)
    {
        // تحميل الصور والريفيوهات مع أصحابها + حساب متوسط التقييم وعدد التقييمات للمنتج ده
        $product->load([
            'reviews.user', // يجيب التقييمات الخاصة بالمنتج مع بيانات اليوزر اللي كتب التقييم
        ])
        ->loadAvg('reviews', 'rating')
        ->loadCount('reviews');

        return view('products.show', compact('product'));
    }
}