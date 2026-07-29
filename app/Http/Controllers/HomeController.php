<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Team;
use App\Models\Review; // 👈 1. إستدعاء موديل الـ Review

class HomeController extends Controller
{
    public function index()
    {
        $product = Product::findOrFail(1);

        $teamMembers = Team::take(4)->get();
        
        // 👈 2. جلب المنتجات المتاحة للاختيار في الفورم (ID والاسم فقط للخفة)
        $allProducts = Product::select('id', 'name')->get();

        // 👈 3. جلب أحدث 3 تقييمات مع بيانات المستخدم والمنتج المرتبط
        $reviews = Review::with(['user', 'product'])->latest()->take(3)->get();

        // 📊 1. حساب متوسط تقييم الشركة (مع تقريبه لرقم عشري واحد)
        $companyRating = number_format(Review::avg('rating') ?? 0, 1);

        // 🔢 2. حساب إجمالي عدد تقييمات الموقع/الشركة
        $totalReviewsCount = Review::count();

        return view("home", [
            'product'     => $product,
            'teamMembers' => $teamMembers,
            'allProducts' => $allProducts,
            'reviews'     => $reviews,
            'companyRating'     => $companyRating,
            'totalReviewsCount' => $totalReviewsCount,
        ]);
    }
}