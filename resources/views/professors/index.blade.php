@extends('layouts.app')

@section('title', 'List of Professors')

@section('content')
<div class="container">
    <h1 class="mb-4">List of Professors</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('professors.create') }}" class="btn btn-success mb-3">Add New Professor</a>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($professors as $professor)
                <tr>
                    <td>{{ $professor->id }}</td>
                    <td>{{ $professor->fullname }}</td>
                    <td>{{ $professor->age }}</td>
                    <td>{{ ucfirst($professor->gender) }}</td>
                    <td>{{ $professor->address }}</td>
                    <td>{{ $professor->telephone }}</td>
                    <td>{{ $professor->email }}</td>
                    <td>
                        <a href="{{ route('professors.show', $professor->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No professors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
