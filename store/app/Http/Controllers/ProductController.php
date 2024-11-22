<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();

        // مقداردهی پیش‌فرض برای فیلدهای اختیاری
        $data['description'] = $request->description ?? '';
        $data['short_description'] = $request->short_description ?? '';
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;
        $data['stock'] = $request->stock ?? 0;

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت اضافه شد.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();

        // مقداردهی پیش‌فرض برای فیلدهای اختیاری
        $data['description'] = $request->description ?? '';
        $data['short_description'] = $request->short_description ?? '';
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;
        $data['stock'] = $request->stock ?? 0;

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'محصول با موفقیت حذف شد.');
    }
}
