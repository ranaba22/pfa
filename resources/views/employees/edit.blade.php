@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Employee Name -->
        <div class="mb-3">
            <label for="nom" class="form-label">Name</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $employee->nom) }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $employee->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Phone -->
        <div class="mb-3">
            <label for="num_tel" class="form-label">Phone</label>
            <input type="text" name="num_tel" id="num_tel" class="form-control" value="{{ old('num_tel', $employee->num_tel) }}" required>
            @error('num_tel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Address -->
        <div class="mb-3">
            <label for="adresse" class="form-label">Address</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $employee->adresse) }}" required>
            @error('adresse')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Department Dropdown -->
        <div class="mb-3">
            <label for="departement_id" class="form-label">Department</label>
            <select name="departement_id" id="departement_id" class="form-control" required>
                <option value="">Select a Department</option>
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}" 
                        {{ old('departement_id', $employee->id_departement) == $departement->id ? 'selected' : '' }}>
                        {{ $departement->nom }}
                    </option>
                @endforeach
            </select>
            @error('departement_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($employee->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="Employee Image" width="100">
                </div>
            @endif
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
