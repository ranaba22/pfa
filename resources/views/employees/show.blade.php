@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employee Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $employee->nom }}
        </div>
        <div class="card-body">
            <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" class="img-thumbnail mb-3" style="max-width: 200px;">
            <p><strong>Email:</strong> {{ $employee->email }}</p>
            <p><strong>Phone:</strong> {{ $employee->num_tel }}</p>
            <p><strong>Address:</strong> {{ $employee->adresse }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
