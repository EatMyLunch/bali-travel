@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Book {{ $package->name }}</h1>
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <input type="hidden" name="package_name" value="{{ $package->name }}">
        
        <div class="mb-3">
            <label for="customer_name" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        
        <div class="mb-3">
            <label for="customer_phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="customer_phone" name="customer_phone" required>
        </div>
        
        <div class="mb-3">
            <label for="total_participant" class="form-label">Number of Participants</label>
            <input type="number" class="form-control" id="total_participant" name="total_participant" min="1" required>
        </div>
        
        <div class="mb-3">
            <label for="total_day" class="form-label">Number of Days</label>
            <input type="number" class="form-control" id="total_day" name="total_day" min="1" required>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="accommodation" name="accommodation" value="1">
            <label class="form-check-label" for="accommodation">Accommodation</label>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="transportation" name="transportation" value="1">
            <label class="form-check-label" for="transportation">Transportation</label>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="food" name="food" value="1">
            <label class="form-check-label" for="food">Food</label>
        </div>
        
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection