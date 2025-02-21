<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') -Agency Homepage</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>

    <nav class="custom-navbar">
        <div class="nav-container">
            <a class="nav-brand" href="{{ url('/') }}">
                <img src="/images/logo.png" alt="Logo" class="nav-logo">
                Byte<span class="nav-highlight">Crafters</span>
            </a>
            <ul class="nav-menu">
                <li><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link">About us</a></li>
                <li><a href="{{ route('services') }}" class="nav-link">Services</a></li>
                <li><a href="{{ route('portfolio') }}" class="nav-link">Portfolio</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            </ul>
            <a href="#" class="btn-primary buy-btn">Buy now</a>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="custom-footer">
        <div class="footer-container">
            <div class="footer-column footer-brand">
                <a class="nav-brand" href="{{ url('/') }}">
                    <img src="/images/logo.png" alt="Logo" class="nav-logo">
                    Byte<span class="nav-highlight">Crafters</span>
                </a>
                <p>Carre Eden R103, <br> Gueliz <br> Morocco</p>
            </div>

            <div class="footer-column">
                <h4>Services</h4>
                <ul>
                    <li><a href="#">Complex Page Ranking</a></li>
                    <li><a href="#">Site Optimisation</a></li>
                    <li><a href="#">User Retention</a></li>
                    <li><a href="#">Complex Monitoring</a></li>
                    <li><a href="#">Boosting Ranking</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Website</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 Byte Crafters | All Rights Reserved | Powered by <a href="#">ByteCrafters</a></p>
        </div>
    </footer>




    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>