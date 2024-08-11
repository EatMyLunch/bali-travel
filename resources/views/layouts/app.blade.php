<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bali Travel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/lux/bootstrap.min.css">
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
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">Bali Travel</a>
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
        <div class="text-center p-3" style="background-color: rgba(44, 44, 44, 0.2);">
            © 2024 Bali Travel. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
</body>

</html>