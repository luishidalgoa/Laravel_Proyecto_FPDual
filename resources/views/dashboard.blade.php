<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema de Observaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Incluir Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-light">
    <!-- Reemplazar la barra de navegación con el navigation-menu de Livewire -->
    @livewire('navigation-menu')

    <!-- Contenido principal -->
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Mensajes de estado -->
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Formulario para nueva observación -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white">
                        <h2 class="h5 mb-0">Nueva Observación</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('notes.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <textarea class="form-control" name="notes" rows="4" 
                                    placeholder="Escribe tus observaciones aquí..." required>{{ old('notes') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Observación</button>
                        </form>
                    </div>
                </div>

                <!-- Listado de observaciones -->
                @foreach($notes as $note)
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <p class="mb-0 text-muted small">Creada: {{ $note->created_at->format('d/m/Y H:i') }}</p>
                            <div class="btn-group">
                                <a href="{{ route('notes.edit', $note) }}" class="btn btn-sm btn-outline-secondary">
                                    <i class="bi bi-pencil-square me-1"></i>Editar
                                </a>
                                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" 
                                        onclick="return confirm('¿Eliminar esta observación?')">
                                        <i class="bi bi-trash me-1"></i>Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <p class="mb-0">{!! nl2br(e($note->notes)) !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Incluir Livewire Scripts -->
    @livewireScripts
</body>
</html>