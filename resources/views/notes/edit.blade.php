@extends('layouts.perfil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h2 class="h5 mb-0">Editar Observación</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('notes.update', $note->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="notes" class="form-label">Observación</label>
                            <textarea class="form-control" name="notes" id="notes" rows="6" required>{{ old('notes', $note->notes) }}</textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Actualizar Observación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection