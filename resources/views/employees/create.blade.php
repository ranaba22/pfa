@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Employee Name -->
        <div class="mb-3">
            <label for="nom" class="form-label">Name</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Phone -->
        <div class="mb-3">
            <label for="num_tel" class="form-label">Phone</label>
            <input type="text" name="num_tel" id="num_tel" class="form-control" value="{{ old('num_tel') }}" required>
            @error('num_tel')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Address -->
        <div class="mb-3">
            <label for="adresse" class="form-label">Address</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}" required>
            @error('adresse')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Department Dropdown -->
        <div class="mb-3">
            <label for="id_departement" class="form-label">Department</label>
            <select name="id_departement" id="id_departement" class="form-control" required>
                <option value="">Select a Department</option>
                @foreach ($departements as $departement)
                    <option value="{{ $departement->id }}" 
                        {{ old('id_departement') == $departement->id ? 'selected' : '' }}>
                        {{ $departement->nom }}
                    </option>
                @endforeach
            </select>
            @error('id_departement')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Employee Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
