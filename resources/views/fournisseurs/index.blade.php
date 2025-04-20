@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fournisseurs</h1>
    <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary mb-3">Add New Supplier</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $fournisseur->nom }}</td>
                    <td>{{ $fournisseur->email }}</td>
                    <td>{{ $fournisseur->num_tel }}</td>
                    <td>{{ $fournisseur->adresse }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-info btn-sm">View</a>
                        <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline-block;">
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
