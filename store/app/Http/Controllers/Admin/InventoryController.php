<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::with(['product', 'warehouse'])->get();
        return view('admin.inventories.index', compact('inventories'));
    }

    public function create()
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('admin.inventories.create', compact('products', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:0',
        ]);

        Inventory::create($request->all());

        return redirect()->route('admin.inventories.index')->with('success', 'موجودی با موفقیت ایجاد شد.');
    }

    public function edit(Inventory $inventory)
    {
        $products = Product::all();
        $warehouses = Warehouse::all();
        return view('admin.inventories.edit', compact('inventory', 'products', 'warehouses'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $inventory->update($request->all());

        return redirect()->route('admin.inventories.index')->with('success', 'موجودی با موفقیت به‌روزرسانی شد.');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory
::contentReference[oaicite:0]{index=0}
 
