@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Supplier</h1>
    <form action="{{ route('fournisseurs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Name</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="num_tel" class="form-label">Phone</label>
            <input type="text" name="num_tel" id="num_tel" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">Address</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
