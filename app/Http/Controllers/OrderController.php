<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'package_name' => 'nullable|string|max:255',
            'total_participant' => 'required|integer|min:1',
            'total_day' => 'required|integer|min:1',
            'accommodation' => 'required|boolean',
            'transportation' => 'required|boolean',
            'food' => 'required|boolean',
            'travel_price' => 'nullable|integer',
            'total_bill' => 'nullable|integer',
        ]);

        Order::create($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'package_name' => 'nullable|string|max:255',
            'total_participant' => 'required|integer|min:1',
            'total_day' => 'required|integer|min:1',
            'accommodation' => 'required|boolean',
            'transportation' => 'required|boolean',
            'food' => 'required|boolean',
            'travel_price' => 'nullable|integer',
            'total_bill' => 'nullable|integer',
        ]);

        $order->update($validatedData);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
