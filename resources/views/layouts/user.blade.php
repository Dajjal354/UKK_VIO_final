<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=Raleway" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>

    </style>
</head>
<body>
    <div id="app">
         @include('partials.navbar')
         </div>

        <!-- Main Content -->
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiperTestimoni", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
  <footer class="footer mt-5">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4>Study Tracer</h4>
                    <p class="footer-description">Menghubungkan alumni dengan almamater untuk masa depan pendidikan yang lebih baik.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Hubungi Kami</h4>
                    <ul class="contact-info">
                        <li><i class="fas fa-phone me-2"></i>(021) 1234-5678</li>
                        <li><i class="fas fa-envelope me-2"></i>info@studytracer.ac.id</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Jl. Pendidikan No. 123, Jakarta</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Media Sosial</h4>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Study Tracer. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>