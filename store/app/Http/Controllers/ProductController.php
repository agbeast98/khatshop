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
            'categories' => 'nullable|array',
            'discount_price' => 'nullable|numeric',
            'discount_expiry' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;

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
            'categories' => 'nullable|array',
            'discount_price' => 'nullable|numeric',
            'discount_expiry' => 'nullable|date',
        ]);

        $data = $request->all();
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }
}
