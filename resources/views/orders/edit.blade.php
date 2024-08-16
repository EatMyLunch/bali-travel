@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3"><a href="{{ route('orders.index') }}">Order</a> / Manual Edit</h1>
    
    <form action="{{ isset($order) ? route('orders.update', $order) : route('orders.store') }}" method="POST">
        @csrf
        @if(isset($order))
            @method('PUT')
        @endif
        <input type="hidden" name="id" value="{{ old('id', $order->id ?? '') }}" required>

        <div class="form-group mb-3">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name ?? '') }}" required>
        </div>

        <div class="form-group  mb-3">
            <label for="customer_phone">Customer Phone</label>
            <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $order->customer_phone ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Travel Date</label>
            <input type="date" class="form-control" id="order_date" name="order_date" value="{{ old('order_date', $order->order_date) }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="package_name">Package Name</label>
            <input type="text" class="form-control" id="package_name" name="package_name" value="{{ old('package_name', $order->package_name ?? '') }}">
        </div>

        <div class="form-group mb-3">
            <label for="total_participant">Total Participants</label>
            <input type="number" class="form-control" id="total_participant" name="total_participant" value="{{ old('total_participant', $order->total_participant ?? '') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="total_day">Total Days</label>
            <input type="number" class="form-control" id="total_day" name="total_day" value="{{ old('total_day', $order->total_day ?? '') }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="accommodation" name="accommodation" value="1" {{ old('accommodation', $order->accommodation ?? '') ? 'checked' : '' }}>
            <label class="form-check-label" for="accommodation">Accommodation</label>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="transportation" name="transportation" value="1" {{ old('transportation', $order->transportation ?? '') ? 'checked' : '' }}>
            <label class="form-check-label" for="transportation">Transportation</label>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="food" name="food" value="1" {{ old('food', $order->food ?? '') ? 'checked' : '' }}>
            <label class="form-check-label" for="food">Food</label>
        </div>

        <div class="form-group mb-3">
            <label for="travel_price">Travel Price</label>
            <input type="number" class="form-control" id="travel_price" name="travel_price" value="{{ old('travel_price', $order->travel_price ?? '') }}">
        </div>

        <div class="form-group mb-3">
            <label for="total_bill">Total Bill</label>
            <input type="number" class="form-control" id="total_bill" name="total_bill" value="{{ old('total_bill', $order->total_bill ?? '') }}">
        </div>

        <button type="submit" class="btn btn-primary mt-2">{{ isset($order) ? 'Update' : 'Create' }}</button>
    </form>
</div>
@endsection