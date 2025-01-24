<!-- resources/views/companys/edit.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Edit Company</h1>

<form action="{{ route('companys.update', $company->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}">
    </div>
    <div class="form-group">
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $company->telephone }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}">
    </div>
    <div class="form-group">
        <label for="date_creation">Date Creation</label>
        <input type="date" name="date_creation" id="date_creation" class="form-control" value="{{ $company->date_creation }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
