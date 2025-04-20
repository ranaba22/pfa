@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Supplier Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $fournisseur->nom }}
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> {{ $fournisseur->email }}</p>
            <p><strong>Phone:</strong> {{ $fournisseur->num_tel }}</p>
            <p><strong>Address:</strong> {{ $fournisseur->adresse }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
