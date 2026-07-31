<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active'   => 'required|boolean',
            'image_1'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // Generate Slug
        $validated['slug'] = Str::slug($request->name) . '-' . time();

        // Upload Image
        if ($request->hasFile('image_1')) {

            $image = $request->file('image_1');

            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();

            $image->storeAs('products', $imageName, 'public');

            $validated['image_1'] = 'products/' . $imageName;
        }

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully!');
}

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // 1. Validation
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'is_active'   => 'required|boolean',
            'image_1'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // 2. تحديث الـ Slug فقط لو اسم المنتج اتغير
        if ($request->name !== $product->name) {
            $validated['slug'] = Str::slug($request->name) . '-' . time();
        }

        // 3. التعامل مع رفع الصورة الجديدة
        if ($request->hasFile('image_1')) {

            // حذف الصورة القديمة من الـ Storage لو كانت موجودة
            if ($product->image_1 && Storage::disk('public')->exists($product->image_1)) {
                Storage::disk('public')->delete($product->image_1);
            }

            // رفع الصورة الجديدة
            $image = $request->file('image_1');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');

            $validated['image_1'] = 'products/' . $imageName;
        }

        // 4. تحديث البيانات في الداتا بيز
        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        // 1. مسح صورة المنتج من الـ Storage لو كانت موجودة
        if ($product->image_1 && Storage::disk('public')->exists($product->image_1)) {
            Storage::disk('public')->delete($product->image_1);
        }

        // 2. حذف المنتج من الداتا بيز
        $product->delete();

        // 3. التوجيه مع رسالة نجاح
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}