<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // لیست محصولات
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products')); // تغییر مسیر ویو
    }

    // نمایش فرم افزودن محصول
    public function create()
    {
        return view('admin.products.create'); // تغییر مسیر ویو
    }

    // افزودن محصول به پایگاه داده
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

    // نمایش محصول خاص
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product')); // تغییر مسیر ویو
    }

    // نمایش فرم ویرایش محصول
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product')); // تغییر مسیر ویو
    }

    // به‌روزرسانی اطلاعات محصول
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
