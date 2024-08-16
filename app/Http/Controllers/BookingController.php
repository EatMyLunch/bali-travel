<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index');
    }

    public function getData(Request $request)
    {
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);
        $sort = $request->input('sort', 'id');
        $order = $request->input('order', 'asc');
        $search = $request->input('search', '');

        $query = Package::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }

        $total = $query->count();

        $packages = $query->orderBy($sort, $order)
            ->skip($offset)
            ->take($limit)
            ->get();

        return response()->json([
            'total' => $total,
            'rows' => $packages
        ]);
    }

    public function order($id)
    {
        $package = Package::findOrFail($id);
        return view('bookings.order', compact('package'));
    }

    public function store(Request $request)
    {
        //validation
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'order_date' => 'required|date',
            'package_name' => 'required|string|max:255',
            'total_participant' => 'required|integer|min:1',
            'total_day' => 'required|integer|min:1',
            'accommodation' => 'nullable|boolean',
            'transportation' => 'nullable|boolean',
            'food' => 'nullable|boolean',
            'travel_price' => 'required|integer|min:0',
            'total_bill' => 'required|integer|min:0',
        ]);

        // checkbox value checker
        $validatedData['accommodation'] = $request->has('accommodation');
        $validatedData['transportation'] = $request->has('transportation');
        $validatedData['food'] = $request->has('food');

        // Recalculate value for backend
        $travelPrice = 0;
        if ($validatedData['accommodation']) $travelPrice += 1000000;
        if ($validatedData['transportation']) $travelPrice += 1200000;
        if ($validatedData['food']) $travelPrice += 500000;

        $totalBill = $validatedData['total_participant'] * $validatedData['total_day'] * $travelPrice;
        
        $validatedData['travel_price'] = $travelPrice;
        $validatedData['total_bill'] = $totalBill;

        $order = Order::create($validatedData);
        return redirect()->route('bookings.index')
            ->with('success', 'Booking successful');
    }
}
