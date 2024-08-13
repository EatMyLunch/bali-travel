@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">About Us</h1>
            <p class="lead mb-5">Discover the Bali with us - your gateway to unforgettable adventures.</p>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Our Mission</h2>
                    <p class="card-text">We're on a mission to make travel accessible, enjoyable, and memorable for everyone. Our diverse range of travel packages caters to all preferences and budgets, ensuring that every journey with us is nothing short of extraordinary.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">What We Offer</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <i class="fas fa-suitcase fa-3x mb-3"></i>
                    <h5>Travel Packages</h5>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="fas fa-hotel fa-3x mb-3"></i>
                    <h5>Accommodation</h5>
                </div>
                <div class="col-md-4 mb-3">
                    <i class="fas fa-utensils fa-3x mb-3"></i>
                    <h5>Food Experiences</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Why Choose Us</h2>
                    <p class="card-text">With years of industry experience, we've cultivated strong partnerships to offer you the best services at competitive prices. Our team of travel experts is always ready to help you plan your perfect getaway.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2 class="mb-4">Contact Us</h2>
            <p class="lead">We're here to answer your questions and help you plan your next adventure.</p>
            <p><i class="fas fa-envelope mr-2"></i> info@example.com</p>
            <p><i class="fas fa-phone mr-2"></i> +1 (123) 456-7890</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush