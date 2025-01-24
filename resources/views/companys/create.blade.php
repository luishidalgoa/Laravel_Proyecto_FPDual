<!-- resources/views/companys/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Create Company</h1>

<form action="{{ route('companys.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address" class="form-control">
    </div>
    <div class="form-group">
        <label for="telephone">Telephone</label>
        <input type="text" name="telephone" id="telephone" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="date_creation">Date Creation</label>
        <input type="date" name="date_creation" id="date_creation" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
