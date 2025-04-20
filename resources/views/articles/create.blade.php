@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Add New Article</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Name</label>
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="Enter article name" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="quantité" class="form-label">Quantity</label>
                    <input type="number" name="quantité" id="quantité" class="form-control" placeholder="Enter quantity" required>
                </div>
                <div class="mb-3">
                    <label for="prix_d_achat" class="form-label">Purchase Price</label>
                    <input type="number" step="0.01" name="prix_d_achat" id="prix_d_achat" class="form-control" placeholder="Enter purchase price" required>
                </div>
                <div class="mb-3">
                    <label for="prix_de_vente" class="form-label">Sale Price</label>
                    <input type="number" step="0.01" name="prix_de_vente" id="prix_de_vente" class="form-control" placeholder="Enter sale price" required>
                </div>
                <div class="mb-3">
                    <label for="id_categorie" class="form-label">Category</label>
                    <select name="id_categorie" id="id_categorie" class="form-select" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_fournisseur" class="form-label">Supplier</label>
                    <select name="id_fournisseur" id="id_fournisseur" class="form-select" required>
                        <option value="" disabled selected>Select a supplier</option>
                        @foreach ($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">Save Article</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
