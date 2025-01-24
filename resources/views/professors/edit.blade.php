@extends('layouts.app')

@section('title', 'Edit Professor')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Professor</h1>

    <form action="{{ route('professors.update', $professor->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        <!-- Campos similares al formulario de creación con valores existentes -->
        <input type="text" name="fullname" placeholder="Nombre Completo" required>
        <input type="number" name="age" placeholder="Edad" required>
        <input type="text" name="address" placeholder="Dirección" required>
        <input type="text" name="telephone" placeholder="Teléfono" required>
        <input type="email" name="email" placeholder="Correo Electrónico" required>
        <select name="gender" id="gender" required>
            <option value="male">Masculino</option>
            <option value="female">Femenino</option>
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection