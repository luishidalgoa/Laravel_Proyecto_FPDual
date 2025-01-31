@extends('layouts.app')

@section('title', 'List of Companies')

@section('content')
<div class="container">
    <h1 class="mb-4">List of Companies</h1>

    <!-- Mostrar mensaje de éxito si existe -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar una nueva compañía -->
    <a href="{{ route('companys.create') }}" class="btn btn-success mb-3">Add New Company</a>

    <!-- Tabla para listar las compañías -->
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Date Creation</th>
                <th>Professor ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre las compañías y mostrarlas en la tabla -->
            @forelse($companys as $company)
                <tr>
                    <td>{{ $company->id }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->address }}</td>
                    <td>{{ $company->telephone }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->date_creation }}</td>
                    <td>{{ $company->professor_id }}</td>
                    <td>
                        <!-- Botones para ver, editar y eliminar una compañía -->
                        <a href="{{ route('companys.show', $company->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('companys.edit', $company->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('companys.destroy', $company->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- Mostrar mensaje si no se encuentran compañías -->
                <tr>
                    <td colspan="8" class="text-center">No companies found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
