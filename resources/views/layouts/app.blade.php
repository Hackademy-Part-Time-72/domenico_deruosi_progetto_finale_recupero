<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap');

        body {
            background-color: #f5f5dc; /* Beige */
            color: #4a4a4a;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            line-height: 1.6;
        }
        main {
            flex: 1;
        }
        .navbar-custom {
            background-color: rgba(250, 249, 246, 0.95); /* Light Beige with transparency */
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(210, 180, 140, 0.3);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }
        .navbar-custom.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        .logo-text {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #2d5a27; /* Dark Green */
            font-size: 1.5rem;
        }
        .logo-icon {
            color: #2d5a27;
            transition: transform 0.3s ease;
        }
        .navbar-brand:hover .logo-icon {
            transform: rotate(180deg);
        }
        .nav-link {
            color: #4a4a4a !important;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            padding: 0.5rem 1.25rem !important;
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background-color: #2d5a27;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        .nav-link:hover::after {
            width: 30%;
        }
        .nav-link:hover {
            color: #2d5a27 !important;
        }
        .nav-link.active {
            color: #2d5a27 !important;
        }
        .nav-link.active::after {
            width: 30%;
        }
        .btn-auth {
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login {
            color: #2d5a27 !important;
            background: transparent;
        }
        .btn-register {
            background-color: #2d5a27;
            color: #faf9f6 !important;
            margin-left: 10px;
        }
        .btn-register:hover {
            background-color: #1e3d1a;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.2);
        }
        
        /* Global Card Styles */
        .custom-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: #ffffff;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }
        .custom-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(45, 90, 39, 0.12) !important;
        }
        .card-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 200px;
        }
        .card-img-top {
            transition: transform 0.6s ease;
            object-fit: cover;
            height: 100%;
        }
        .custom-card:hover .card-img-top {
            transform: scale(1.1);
        }
        .card-category {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(45, 90, 39, 0.85);
            backdrop-filter: blur(5px);
            color: white;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 10;
        }
        .card-content {
            padding: 1.5rem;
        }
        .card-meta {
            font-size: 0.8rem;
            color: #888;
            margin-bottom: 10px;
        }
        .card-meta i {
            margin-right: 5px;
            color: #2d5a27;
        }
        
        /* Custom UI improvements */
        .card {
            border: 1px solid #d2b48c;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary {
            background-color: #2d5a27;
            border-color: #2d5a27;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #1e3d1a;
            border-color: #1e3d1a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.2);
        }
        .btn-outline-primary {
            color: #2d5a27;
            border-color: #2d5a27;
            border-radius: 50px;
        }
        .btn-outline-primary:hover {
            background-color: #2d5a27;
            border-color: #2d5a27;
        }

        .footer-custom {
            background-color: #2d5a27;
            color: #faf9f6;
            padding: 4rem 0 2rem 0;
            margin-top: 5rem;
        }
        .footer-link {
            color: #faf9f6;
            text-decoration: none;
            transition: all 0.2s;
            opacity: 0.9;
        }
        .footer-link:hover {
            opacity: 1;
            transform: scale(1.1);
            color: #ffffff;
        }
        .social-icon {
            width: 28px;
            height: 28px;
            margin: 0 12px;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 4px;
            background-color: #2d5a27;
            border-radius: 2px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <div class="logo-container me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-circle-half logo-icon" viewBox="0 0 16 16">
                        <path d="M8 15V1ad.5.5 0 0 1 0 14zm0 1A7 7 0 1 1 8 0a7 7 0 0 1 0 14z"/>
                    </svg>
                </div>
                <span class="logo-text">Mindspace</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articles.blog') ? 'active' : '' }}" href="{{ route('articles.blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about.us') ? 'active' : '' }}" href="{{ route('about.us') }}">Chi Siamo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contattaci</a>
                    </li>
                    <div class="ms-lg-3 d-flex align-items-center">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link btn-auth btn-login" href="{{ route('login') }}">Accedi</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-auth btn-register" href="{{ route('register') }}">Registrati</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('articles.index') ? 'active' : '' }}" href="{{ route('articles.index') }}">I miei Articoli</a>
                            </li>
                            <li class="nav-item dropdown ms-lg-2">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="me-1">Benvenuto, {{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" aria-labelledby="navbarDropdown">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item text-danger">Esci</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="footer-custom">
        <div class="container text-center">
            <div class="mb-4">
                <a class="d-flex align-items-center justify-content-center text-decoration-none mb-3" href="{{ url('/') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1e3d1a" class="bi bi-circle-half me-2" viewBox="0 0 16 16">
                        <path d="M8 15V1ad.5.5 0 0 1 0 14zm0 1A7 7 0 1 1 8 0a7 7 0 0 1 0 14z"/>
                    </svg>
                    <span class="h4 mb-0 fw-bold" style="color: #1e3d1a;">Mindspace</span>
                </a>
                <p class="small mb-4">Divulgazione psicologica e benessere mentale.</p>
                <div class="d-flex justify-content-center mb-4">
                    <a href="#" class="footer-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook social-icon" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram social-icon" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.282.11-.705.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter-x social-icon" viewBox="0 0 16 16">
                            <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="border-top border-light pt-3">
                <p class="mb-0 small">&copy; {{ date('Y') }} Mindspace. Tutti i diritti riservati.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
