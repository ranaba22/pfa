@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Article Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $article->nom }}
        </div>
        <div class="card-body">
            <p><strong>Image:</strong></p>
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" width="200">
            <p><strong>Quantity:</strong> {{ $article->quantité }}</p>
            <p><strong>Purchase Price:</strong> {{ $article->prix_d_achat }} TND</p>
            <p><strong>Sale Price:</strong> {{ $article->prix_de_vente }} TND</p>
            <p><strong>Category:</strong> {{ $article->category->nom }}</p>
            <p><strong>Supplier:</strong> {{ $article->fournisseur->nom }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
