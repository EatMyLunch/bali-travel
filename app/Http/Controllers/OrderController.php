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

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'order_date' => 'required|date',
            'package_name' => 'nullable|string|max:255',
            'total_participant' => 'required|integer|min:1',
            'total_day' => 'required|integer|min:1',
            'travel_price' => 'nullable|integer',
            'total_bill' => 'nullable|integer',
        ]);
    
        // Handle checkbox fields
        $validatedData['accommodation'] = $request->has('accommodation');
        $validatedData['transportation'] = $request->has('transportation');
        $validatedData['food'] = $request->has('food');
    
        $order->update($validatedData);
    
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
