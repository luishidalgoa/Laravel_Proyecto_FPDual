@extends('layouts.app')

@section('title', 'Company Details')

@section('content')
<div class="container">
    <h1 class="mb-4">Company Details</h1>

    <!-- Tarjeta para mostrar los detalles de la compañía -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>{{ $company->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $company->id }}</p>
            <p><strong>Address:</strong> {{ $company->address }}</p>
            <p><strong>Telephone:</strong> {{ $company->telephone }}</p>
            <p><strong>Email:</strong> {{ $company->email }}</p>
            <p><strong>Date Creation:</strong> {{ $company->date_creation }}</p>
            <p><strong>Professor ID:</strong> {{ $company->professor_id }}</p>
        </div>
        <div class="card-footer text-end">
            <!-- Botones para volver a la lista, editar y eliminar la compañía -->
            <a href="{{ route('companys.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('companys.edit', $company->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('companys.destroy', $company->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
