<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $data = $request->except(['main_image', 'gallery']);
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;

        // مدیریت آپلود تصویر اصلی
        if ($request->hasFile('main_image')) {
            $mainImage = $request->file('main_image');
            $mainImagePath = $mainImage->store('public/image/products');
            $data['main_image'] = str_replace('public/', '', $mainImagePath);
        }

        // مدیریت آپلود گالری تصاویر
        if ($request->hasFile('gallery')) {
            $galleryImages = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $path = $galleryImage->store('public/image/products');
                $galleryImages[] = str_replace('public/', '', $path);
            }
            $data['gallery'] = json_encode($galleryImages);
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت اضافه شد.');
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
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $data = $request->except(['main_image', 'gallery']);
        $data['tags'] = $request->tags ? json_encode(explode(',', $request->tags)) : null;
        $data['categories'] = $request->categories ? json_encode($request->categories) : null;

        // مدیریت آپلود تصویر اصلی
        if ($request->hasFile('main_image')) {
            if ($product->main_image) {
                Storage::delete('public/' . $product->main_image);
            }
            $mainImagePath = $request->file('main_image')->store('public/image/products');
            $data['main_image'] = str_replace('public/', '', $mainImagePath);
        }

        // مدیریت آپلود گالری تصاویر
        if ($request->hasFile('gallery')) {
            if ($product->gallery) {
                foreach (json_decode($product->gallery) as $galleryImage) {
                    Storage::delete('public/' . $galleryImage);
                }
            }
            $galleryImages = [];
            foreach ($request->file('gallery') as $galleryImage) {
                $path = $galleryImage->store('public/image/products');
                $galleryImages[] = str_replace('public/', '', $path);
            }
            $data['gallery'] = json_encode($galleryImages);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Product $product)
    {
        if ($product->main_image) {
            Storage::delete('public/' . $product->main_image);
        }
        if ($product->gallery) {
            foreach (json_decode($product->gallery) as $galleryImage) {
                Storage::delete('public/' . $galleryImage);
            }
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'محصول با موفقیت حذف شد.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }
}
