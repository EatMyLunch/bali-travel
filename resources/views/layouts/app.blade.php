<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bali Travel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
        }

        main {
            flex: 1;
        }
    </style>
    @yield('styles')
    @stack('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Bali Travel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getController() instanceof \App\Http\Controllers\HomeController ? 'active' : '' }}"
                            href="{{ route('home.index') }}">
                            Home <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getController() instanceof \App\Http\Controllers\BookingController ? 'active' : '' }}"
                            href="{{ route('bookings.index') }}">Book Travel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getController() instanceof \App\Http\Controllers\AboutController ? 'active' : '' }}"
                            href="{{ route('about.index') }}">About</a>
                    </li>
                    @auth('admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle 
                            {{ request()->route()->getController() instanceof \App\Http\Controllers\BannerController 
                            || request()->route()->getController() instanceof \App\Http\Controllers\PackageController 
                            || request()->route()->getController() instanceof \App\Http\Controllers\VideoController ? 'active' : '' }}"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                            aria-expanded="false">Admin
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->route()->getController() instanceof \App\Http\Controllers\BannerController ? 'active' : '' }}"
                                href="{{ route('banners.index') }}">Front Page Banner</a>
                            <a class="dropdown-item {{ request()->route()->getController() instanceof \App\Http\Controllers\PackageController ? 'active' : '' }}"
                                href="{{ route('packages.index') }}">Packages</a>
                            <a class="dropdown-item {{ request()->route()->getController() instanceof \App\Http\Controllers\VideoController ? 'active' : '' }}"
                                href="{{ route('videos.index') }}">Videos Branding</a>
                            <a class="dropdown-item {{ request()->route()->getController() instanceof \App\Http\Controllers\AccessController ? 'active' : '' }}"
                                href="{{ route('access.index') }}">Admin Access</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->route()->getController() instanceof \App\Http\Controllers\OrderController ? 'active' : '' }}"
                            href="{{ route('orders.index') }}">Order List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.logout') }}" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    @if ($message = Session::get('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-success">Success</strong>
                <small>a few seconds ago</small>
                <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
    @endif

    <main>
        @yield('content')
    </main>

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
                        <li><a href="/about" class="text-dark">About Us</a></li>
                        <li><a href="https://wa.me/6289646746830" class="text-dark" target="_blank">Contact</a></li>
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
        <div class="text-center p-3" style="background-color: rgba(44, 44, 44, 0.2);">
            © 2024 Andas Puranda. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 3000
                })
            })
            toastList.forEach(toast => toast.show())
        });
    </script>
    @yield('scripts')
    @stack('scripts')
</body>

</html>