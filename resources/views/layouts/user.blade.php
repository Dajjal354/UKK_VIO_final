<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Raleway" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Raleway', sans-serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        /* Navbar Styles */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand h3 {
            color: #2c3e50;
            font-weight: bold;
            margin: 0;
        }

        .nav-link {
            color: #2c3e50 !important;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #3498db !important;
        }

        /* Profile Image */
        .image-profile {
            border: 2px solid #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image-profile:hover {
            transform: scale(1.1);
        }

        /* Dropdown Menu */
        .dropdown-menu {
            background: #ffffff;
            border: 1px solid #e1e8ed;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item {
            color: #2c3e50;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            color: #3498db;
            transform: translateX(5px);
        }

        .dropdown-divider {
            border-color: #e1e8ed;
        }

        /* Main Content */
        .main-content {
            background: #ffffff;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        /* Welcome Text */
        .welcome-text {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Info Cards */
        .info-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid #e1e8ed;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .info-card h3 {
            color: #2c3e50;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }

        .info-card p {
            color: #5a6c7d;
            line-height: 1.6;
        }

        .info-card i {
            color: #3498db;
        }

        /* Survey Button */
        .btn-survey {
            background: #3498db;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
        }

        .btn-survey:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(52, 152, 219, 0.3);
            color: white;
        }

        /* Container padding */
        .container {
            padding: 0 2rem;
        }
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
</body>
</html>