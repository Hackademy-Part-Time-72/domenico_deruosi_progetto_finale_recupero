<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindspace - Mindfulness & Psicologia</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #fdfaf6;
            color: #4a4a4a;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(107, 142, 35, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
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

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #8da399, #a8dadc);
            color: white;
            padding: 100px 0;
            border-radius: 0 0 50px 50px;
            box-shadow: inset 0 -10px 20px rgba(0,0,0,0.05);
        }

        /* CARD */
        .card-custom {
            border: none;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            background: #fff;
            overflow: hidden;
        }

        .card-custom:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* BUTTON */
        .btn {
            border-radius: 14px;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: #6b8e23;
            border-color: #6b8e23;
        }

        .btn-primary:hover {
            background-color: #556b2f;
            border-color: #556b2f;
            transform: scale(1.05);
        }

        /* FOOTER */
        footer {
            margin-top: 100px;
            padding: 40px 0;
            background: #fff;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <a class="navbar-brand fw-bold text-white" href="/">
                <i class="bi bi-wind"></i> Mindspace
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Psicologia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mindfulness</a>
                    </li>

                    @auth
                    <li class="nav-item mx-lg-2">
                        <a href="/articles" class="btn btn-light btn-sm text-success">
                            <i class="bi bi-journal-text"></i> I miei articoli
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
                        <a href="/login" class="btn btn-link text-white text-decoration-none">Login</a>
                    </li>

                    <li class="nav-item">
                        <a href="/register" class="btn btn-light btn-sm text-success">Unisciti a noi</a>
                    </li>
                    @endauth

                </ul>
            </div>

        </div>
    </nav>

    <!-- CONTENUTO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="text-center text-muted">
        <div class="container">
            <h5 class="fw-bold mb-3 text-dark">Mindspace</h5>
            <p class="mb-3">Il tuo rifugio per la mente e l'anima.</p>
            <div class="mb-4">
                <a href="#" class="text-muted me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-muted me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-muted"><i class="bi bi-twitter-x"></i></a>
            </div>
            <p class="mb-1">© {{ date('Y') }} Mindspace. Tutti i diritti riservati.</p>
            <small>Creato con cura per il benessere personale.</small>
        </div>
    </footer>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
