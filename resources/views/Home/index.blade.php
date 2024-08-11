@extends('layouts.app')

@section('content')
<style>
    .banner {
        width: 100%;
        max-height: 400px;
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
</style>
<img src="https://dummyimage.com/3794x1072/000/fff" alt="Banner" class="banner">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-8">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <img src="https://dummyimage.com/600x400/000/fff" class="card-img-top" alt="Card image">
                        <div class="card-body">
                            <h5 class="card-title">Card {{ $i }}</h5>
                            <p class="card-text">This is a simple description for Card {{ $i }}. You can replace this with your actual content.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection