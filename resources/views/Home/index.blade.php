@extends('layouts.app')

@section('content')
<style>
    .owl-carousel .item img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
    .menu-container {
        background-color: #f8f9fa;
        padding: 10px 0;
    }
    .menu-item {
        padding: 10px 15px;
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }
    .menu-item:hover {
        background-color: #e9ecef;
    }
    .video-carousel .item {
        padding: 10px;
    }
    .video-carousel .item iframe {
        width: 100%;
        height: 200px;
    }
</style>

<!-- Banner -->
<div class="owl-carousel owl-theme banner-carousel">
    @foreach($banners as $banner)
        <div class="item">
            <img src="{{ Storage::url($banner->image) }}" alt="Banner">
        </div>
    @endforeach
</div>

<!-- Package Header -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Travel Packages</h2>
                <h3 class="section-subheading text-muted">Enjoy and relax your holiday</h3>
            </div>
        </div>
    </div>
</div>

<!-- Packages Section -->
<div class="container mt-4">
    <div class="row">
        @foreach($packages as $package)
            <div class="col-12 col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $package->image }}" class="card-img-top" alt="{{ $package->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $package->name }}</h5>
                        <p class="card-text">{{ $package->description }}</p>
                        <a href="/bookings/order/{{ $package->id}}" target="_blank" class="btn btn-primary">Book now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('bookings.index') }}" class="btn btn-dark">View More Packages</a>
    </div>
</div>

<!-- Videos Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Our Videos</h2>
    <div class="owl-carousel owl-theme video-carousel">
        @foreach($videos as $video)
            <div class="item">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ str_replace('youtu.be/', 'www.youtube.com/embed/', $video->url) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <h5 class="mt-2">{{ $video->name }}</h5>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(".banner-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 1000,
            mouseDrag: true,
            touchDrag: true,
            nav: false,
            dots: false
        });

        $(".video-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            mouseDrag: false,
            touchDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>
@endpush