<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Observaciones Docentes</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('professors.index') }}">Gestión de Profesores</a>
            <a class="navbar-brand" href="{{ route('companys.index') }}">Gestión de Empresas</a>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="container flex-grow-1 py-5">
        <!-- Encabezado -->
        <header class="text-center mb-5">
            <div class="bg-white rounded shadow-sm p-4 mb-4">
                <h1 class="display-4 fw-bold text-dark mb-3">
                    <span class="text-primary">Observaciones</span> Académicas
                </h1>
            </div>
        </header>

        <!-- Descripción del sistema -->
        <div class="bg-white rounded shadow p-4 mb-4 border border-light">
            <h2 class="h2 fw-semibold text-dark mb-3">¿Qué es este sistema?</h2>
            <p class="text-muted">
                Este sistema es una herramienta diseñada para que los docentes puedan <strong>registrarse y loguearse</strong> de manera que puedan acceder a su panel y anotar las observaciones de manera que puedan llevar un control de como el alumnado se desenvuelve en las prácticas.
            </p>
        </div>

        <!-- Acceso -->
        <div class="bg-white rounded shadow p-4 mb-4 text-center border border-light">
            <h3 class="h3 fw-semibold text-dark mb-3">Acceso al Sistema</h3>
            <div class="d-flex flex-column gap-3 justify-content-center">
                @auth
                    <a href="{{ url('/dashboard') }}" 
                       class="btn btn-primary btn-lg">
                        Panel Principal
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="btn btn-primary btn-lg">
                        Acceder como Docente
                    </a>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" 
                           class="btn btn-secondary btn-lg">
                            Registrar Nuevo Profesor
                        </a>
                    @endif
                @endauth
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <p class="mb-0">&copy; 2025 Instituto Francisco de los Ríos. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>