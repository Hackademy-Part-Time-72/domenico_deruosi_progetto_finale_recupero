<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Blog Domenico</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fb;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(13, 110, 253, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: #fff !important;
        }

        .nav-link {
            color: #fff !important;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            color: white;
            padding: 80px 0;
            border-radius: 0 0 40px 40px;
        }

        /* CARD */
        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
            backdrop-filter: blur(10px);
        }

        .card-custom:hover {
            transform: translateY(-8px) scale(1.02);
        }

        /* BUTTON */
        .btn {
            border-radius: 12px;
            transition: 0.3s;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        /* INPUT */
        input.form-control {
            border-radius: 12px;
            padding: 10px;
        }

        /* FOOTER */
        footer {
            margin-top: 80px;
            padding: 20px 0;
            background: #fff;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="/">
                <i class="bi bi-journal-text"></i> Blog Domenico
            </a>

            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    @auth
                    <li class="nav-item me-2">
                        <a href="/articles" class="btn btn-light btn-sm">
                            <i class="bi bi-pencil-square"></i> I miei articoli
                        </a>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="btn btn-outline-light btn-sm">
                                Logout
                            </button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item me-2">
                        <a href="/login" class="btn btn-light btn-sm">Login</a>
                    </li>

                    <li class="nav-item">
                        <a href="/register" class="btn btn-outline-light btn-sm">Registrati</a>
                    </li>
                    @endauth

                </ul>
            </div>

        </div>
    </nav>

    <!-- HERO -->
    <div class="hero text-center">
        <div class="container">
            <h1 class="fw-bold display-5">Benvenuto nel mio Blog </h1>
            <p class="lead mb-4">Condividi idee, articoli e conoscenza</p>

            @guest
            <a href="/register" class="btn btn-light btn-lg me-2">Inizia ora</a>
            <a href="/login" class="btn btn-outline-light btn-lg">Accedi</a>
            @endguest
        </div>
    </div>

    <!-- CONTENUTO -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="text-center text-muted">
        <div class="container">
            <p class="mb-1">© {{ date('Y') }} Domenico De Ruosi</p>
            <small>Progetto Finale Hackademy</small>
        </div>
    </footer>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>