<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mindspace - Psicologia e Mindfulness')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha384-XGjxtQfXaH2tnPFa9x+ruJTuLE3Aa6LhHSqEgt5WMqMRPMWhLQvIg4X0o7hkCx7" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(253, 250, 246, 0.9), rgba(253, 250, 246, 0.9)), url('https://images.unsplash.com/photo-1549472643-4702167d4fcc?q=80&w=1600&auto=format&fit=crop');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color: #4a4a4a;
        }

        .navbar {
            background: rgba(107, 142, 35, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .logo-mindspace {
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            color: #fff !important;
            transition: transform 0.3s ease;
        }

        .logo-mindspace:hover {
            transform: scale(1.05);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: #fff !important;
            letter-spacing: 1px;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .hero {
            background: linear-gradient(135deg, rgba(141, 163, 153, 0.9), rgba(168, 218, 220, 0.9));
            color: white;
            padding: 100px 0;
            border-radius: 0 0 50px 50px;
        }

        .card-custom {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #6b8e23;
            border-color: #6b8e23;
            border-radius: 12px;
        }

        .btn-primary:hover {
            background-color: #556b2f;
            border-color: #556b2f;
        }

        footer {
            margin-top: 100px;
            padding: 40px 0;
            background: rgba(255, 255, 255, 0.9);
            border-top: 1px solid #eee;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 2s ease-out forwards;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand logo-mindspace" href="{{ route('home') }}">
                <i class="bi bi-flower1 text-success me-1"></i> <span class="fw-bold">Mind</span><span class="text-success fw-light">space</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#articoli">Articoli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.show') ? 'active' : '' }}" href="{{ route('contact.show') }}">Contatti</a>
                    </li>

                    @auth
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="btn btn-light btn-sm text-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('articles.index') }}">I miei articoli</a></li>
                            <li><a class="dropdown-item" href="{{ route('articles.create') }}">Crea articolo</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profilo</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- Logout diretto solo su mobile -->
                    <li class="nav-item d-lg-none mt-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm w-100" type="submit">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-link text-white text-decoration-none">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-light btn-sm text-success px-3 rounded-pill">Unisciti a noi</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="text-center text-muted">
        <div class="container">
            <h5 class="mb-3 text-dark fw-bold"><i class="bi bi-flower1 text-success me-1"></i> Mind<span class="text-success fw-light">space</span></h5>
            <p class="mb-3">Il tuo rifugio per la mente e l'anima. Blog italiano di Psicologia e Mindfulness.</p>
            <div class="mb-4">
                <a href="#" class="text-muted me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-muted me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-muted"><i class="bi bi-twitter-x"></i></a>
            </div>
            <p class="mb-1">© {{ date('Y') }} Mindspace. Tutti i diritti riservati.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmBvQ/gBnFTLBXoK0PQKP6YnROR" crossorigin="anonymous"></script>

</body>

</html>