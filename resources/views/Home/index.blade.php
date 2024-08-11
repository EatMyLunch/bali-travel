<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bali Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css" integrity="sha384-9+PGKSqjRdkeAU7Eu4nkJU8RFaH8ace8HGXnkiKMP9I9Te0GJ4/km3L1Z8tXigpG" crossorigin="anonymous">
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Bali Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <img src="https://dummyimage.com/3794x1072/000/fff" alt="Banner" class="banner">

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">One</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Two</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Three</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Four</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Five</a>
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

    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Bali Travel</h5>
                    <p>Experience the beauty of Bali with our travel services.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="text-dark">About Us</a></li>
                        <li><a href="#" class="text-dark">Services</a></li>
                        <li><a href="#" class="text-dark">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled mb-0">
                        <li>123 Travel Street</li>
                        <li>Bali, Indonesia</li>
                        <li>info@balitravel.com</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Bali Travel. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>