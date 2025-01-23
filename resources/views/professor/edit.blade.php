@extends('layouts.app')

@section('title', 'Edit Professor')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Professor</h1>

    <form action="{{ route('professor.update', $professor->id) }}" method="POST" class="card p-4">
        @csrf
        @method('PUT')
        <!-- Campos similares al formulario de creación con valores existentes -->
        @include('professor._form', ['professor' => $professor])
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('professor.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
