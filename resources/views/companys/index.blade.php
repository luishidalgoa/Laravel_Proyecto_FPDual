@extends('layouts.app')

@section('title', 'List of Professors')

@section('content')
<div class="container">
    <h1 class="mb-4">List of companys</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('companys.create') }}" class="btn btn-success mb-3">Add New Company</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Date Creation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companys as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->telephone }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->date_creation }}</td>
                <td>
                    <a href="{{ route('companys.show', $company->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('companys.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('companys.destroy', $company->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection