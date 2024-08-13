@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Book {{ $package->name }}</h1>
    <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm">
        @csrf
        <input type="hidden" name="package_name" value="{{ $package->name }}">
        
        <div class="mb-3">
            <label for="customer_name" class="form-label label-required">Your Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
        </div>
        
        <div class="mb-3">
            <label for="customer_phone" class="form-label label-required">Phone Number</label>
            <input type="tel" class="form-control" id="customer_phone" name="customer_phone" required>
        </div>
        
        <div class="mb-3">
            <label for="total_participant" class="form-label label-required">Number of Participants</label>
            <input type="number" class="form-control" id="total_participant" name="total_participant" min="1" required>
        </div>
        
        <div class="mb-3">
            <label for="total_day" class="form-label label-required">Number of Days</label>
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
        
        <div class="mb-3">
            <label for="travel_price_formatted" class="form-label">Travel Price (IDR) <span class="text-danger">(automated)</span></label>
            <input type="text" class="form-control" id="travel_price_formatted" readonly>
            <input type="hidden" id="travel_price" name="travel_price">
        </div>
        
        <div class="mb-3">
            <label for="total_bill_formatted" class="form-label">Total Bill (IDR) <span class="text-danger">(automated)</span></label>
            <input type="text" class="form-control" id="total_bill_formatted" readonly>
            <input type="hidden" id="total_bill" name="total_bill">
        </div>
        
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        //getting elements
        const form = document.getElementById('bookingForm');
        const accommodationCheckbox = document.getElementById('accommodation');
        const transportationCheckbox = document.getElementById('transportation');
        const foodCheckbox = document.getElementById('food');
        const totalParticipantInput = document.getElementById('total_participant');
        const totalDayInput = document.getElementById('total_day');
        const travelPriceInput = document.getElementById('travel_price');
        const travelPriceFormattedInput = document.getElementById('travel_price_formatted');
        const totalBillInput = document.getElementById('total_bill');
        const totalBillFormattedInput = document.getElementById('total_bill_formatted');
    
        //idr formater only for javascript 
        const formatIDR = (number) => {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(number);
        };

        //calculation
        const calculatePrices = () => {
            let travelPrice = 0;
            if (accommodationCheckbox.checked) travelPrice += 1000000;
            if (transportationCheckbox.checked) travelPrice += 1200000;
            if (foodCheckbox.checked) travelPrice += 500000;
            travelPriceInput.value = travelPrice;
            travelPriceFormattedInput.value = formatIDR(travelPrice);
            const totalParticipants = parseInt(totalParticipantInput.value) || 0;
            const totalDays = parseInt(totalDayInput.value) || 0;
            const totalBill = totalParticipants * totalDays * travelPrice;
            totalBillInput.value = totalBill;
            totalBillFormattedInput.value = formatIDR(totalBill);
        };
    
        form.addEventListener('change', calculatePrices);
        totalParticipantInput.addEventListener('input', calculatePrices);
        totalDayInput.addEventListener('input', calculatePrices);
        calculatePrices();
    });
    </script>
@endsection