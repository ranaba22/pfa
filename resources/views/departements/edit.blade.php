@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Department</h1>
        <form action="{{ route('departements.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Department Name</label>

                <input type="text" name="nom" class="form-control" id="nom"  value="{{ $departement->nom }}"required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection