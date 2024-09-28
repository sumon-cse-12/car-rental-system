<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
  @yield('css')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <!-- Header -->
  <header class="bg-dark text-white">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">

                <a class="app-link" href="{{route('front.index')}}">
                    <img src="{{ asset('images/car-rent.png') }}" alt="Logo" class="me-2 app-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('front.about') }}">About</a>
                        </li>
                        @if(Auth::check() && Auth::user()->role === 'customer')
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('rental.index') }}">Rentals</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('front.contact') }}">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('user.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white nav-link-text" href="{{ route('user.registration') }}">Signup</a>
                        </li>
                    @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

  <!-- Main Content -->
  @yield('main-section')

  <!-- Footer -->
  <footer class="bg-dark text-white pt-4 pb-2">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-4">
                <div class="f-about-us-title">About Us</div>
                <p>Car Rental is a leading provider of affordable and quality car rental services. Our mission is to provide convenient and reliable transportation for all.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('front.index') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('front.about') }}" class="text-white">About</a></li>
                    <li><a href="{{ route('rental.index') }}" class="text-white">Rentals</a></li>
                    <li><a href="{{ route('front.contact') }}" class="text-white">Contact</a></li>
                    <li><a href="{{ route('user.login') }}" class="text-white">Login/Signup</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p><i class="fas fa-envelope"></i> info@carrental.com</p>
                <p><i class="fas fa-phone"></i> +123 456 7890</p>
                <p><i class="fas fa-map-marker-alt"></i> 123 Car Rental Street, City, Country</p>
            </div>
        </div>

        <hr class="bg-light">

        <!-- Social Media Icons -->
        <div class="row">
            <div class="col text-center">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin fa-lg"></i></a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-3">
            <div class="col text-center">
                <p class="mb-0">&copy; 2024 Car Rental. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>

         @if (Session::has('message'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.success("{{ Session::get('message') }}");
         @endif

         @if (Session::has('error'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.error("{{ Session::get('error') }}");
         @endif

         @if (Session::has('info'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.info("{{ Session::get('info') }}");
         @endif

         @if (Session::has('warning'))
             toastr.options = {
                 "closeButton": true,
                 "progressBar": true
             }
             toastr.warning("{{ Session::get('warning') }}");
         @endif
     </script>
       @yield('js')
</body>
</html>
