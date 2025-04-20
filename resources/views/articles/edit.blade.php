@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Article</h1>
    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Name</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $article->nom }}" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" width="100">
        </div>
        <div class="mb-3">
            <label for="quantité" class="form-label">Quantity</label>
            <input type="number" name="quantité" id="quantité" class="form-control" value="{{ $article->quantité }}" required>
        </div>
        <div class="mb-3">
            <label for="prix_d_achat" class="form-label">Purchase Price</label>
            <input type="number" step="0.01" name="prix_d_achat" id="prix_d_achat" class="form-control" value="{{ $article->prix_d_achat }}" required>
        </div>
        <div class="mb-3">
            <label for="prix_de_vente" class="form-label">Sale Price</label>
            <input type="number" step="0.01" name="prix_de_vente" id="prix_de_vente" class="form-control" value="{{ $article->prix_de_vente }}" required>
        </div>
        <div class="mb-3">
            <label for="id_categorie" class="form-label">Category</label>
            <select name="id_categorie" id="id_categorie" class="form-control" required>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $article->id_categorie == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_fournisseur" class="form-label">Supplier</label>
            <select name="id_fournisseur" id="id_fournisseur" class="form-control" required>
                @foreach ($fournisseurs as $fournisseur)
                    <option value="{{ $fournisseur->id }}" {{ $article->id_fournisseur == $fournisseur->id ? 'selected' : '' }}>
                        {{ $fournisseur->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
