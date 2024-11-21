<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'state' => 'required',
            'city' => 'required',
            'full_address' => 'required',
            'postal_code' => 'required',
            'products' => 'required|array',
            'shipping_method' => 'required',
            'shipping_cost' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
        ]);

        $order = Order::create([
            'order_number' => uniqid('ORD-'),
            'user_id' => $request->user_id,
            'order_date' => $request->order_date,
            'total_price' => $request->total_price,
            'status' => $request->status,
            'state' => $request->state,
            'city' => $request->city,
            'full_address' => $request->full_address,
            'postal_code' => $request->postal_code,
            'products' => json_encode($request->products),
            'discount_price' => $request->discount_price,
            'shipping_method' => $request->shipping_method,
            'shipping_cost' => $request->shipping_cost,
            'order_notes' => $request->order_notes,
        ]);

        return redirect()->route('orders.index')->with('success', 'سفارش با موفقیت ثبت شد.');
    }
}
