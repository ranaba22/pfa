@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Add New Article</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Purchase Price</th>
                <th>Sale Price</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $article->nom }}</td>
                    <td><img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" width="50"></td>
                    <td>{{ $article->quantité }}</td>
                    <td>{{ $article->prix_d_achat }} TND</td>
                    <td>{{ $article->prix_de_vente }} TND</td>
                    <td>{{ $article->category->nom }}</td>
                    <td>{{ $article->fournisseur->nom }}</td>
                    <td>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">View</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
