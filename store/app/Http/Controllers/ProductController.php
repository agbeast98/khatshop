<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // نمایش لیست محصولات
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // نمایش فرم ایجاد محصول جدید
    public function create()
    {
        return view('admin.products.create');
    }

    // ذخیره محصول جدید
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت اضافه شد.');
    }

    // نمایش جزئیات محصول
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // نمایش فرم ویرایش محصول
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // به‌روزرسانی محصول
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت ویرایش شد.');
    }

    // حذف محصول
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'محصول با موفقیت حذف شد.');
    }
}
