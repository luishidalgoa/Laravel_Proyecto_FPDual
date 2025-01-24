<!-- resources/views/companys/show.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Company Details</h1>

<p><strong>ID:</strong> {{ $company->id }}</p>
<p><strong>Name:</strong> {{ $company->name }}</p>
<p><strong>Address:</strong> {{ $company->address }}</p>
<p><strong>Telephone:</strong> {{ $company->telephone }}</p>
<p><strong>Email:</strong> {{ $company->email }}</p>
<p><strong>Date Creation:</strong> {{ $company->date_creation }}</p>

<a href="{{ route('companys.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
