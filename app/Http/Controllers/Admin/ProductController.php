<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
            
        return view('admin.products.index',[
            'products' => $products ,
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function edit($product)
    {
        return view('admin.products.edit');
    }
}