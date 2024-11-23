<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'name' => 'required|string|max:255',
            'english_name' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'tags' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'discount_expiry' => 'nullable|date',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'stock' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;

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
            'name' => 'required|string|max:255',
            'english_name' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'width' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'tags' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'discount_expiry' => 'nullable|date',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'stock' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'محصول با موفقیت حذف شد.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
}
