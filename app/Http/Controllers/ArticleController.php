<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'fournisseur'])->get();
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        // Retrieve the article by ID along with its related category and supplier
        $article = Article::with(['category', 'fournisseur'])->findOrFail($id);

        // Return the view with the article data
        return view('articles.show', compact('article'));
    }


    public function create()
    {
        $categories = Category::all();
        $fournisseurs = Fournisseur::all();
        return view('articles.create', compact('categories', 'fournisseurs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'quantité' => 'required|integer|min:0',
            'prix_d_achat' => 'required|numeric|min:0', // Keep this
            'prix_de_vente' => 'required|numeric|min:0',   // Fix this
            'id_fournisseur' => 'required|exists:fournisseurs,id',
            'id_categorie' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }
        Article::create($validated);
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $fournisseurs = Fournisseur::all();
        return view('articles.edit', compact('article', 'categories', 'fournisseurs'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'quantité' => 'required|integer|min:0',
            'prix_d_achat' => 'required|numeric|min:0',
            'prix_de_vente' => 'required|numeric|min:0',
            'id_fournisseur' => 'required|exists:fournisseurs,id',
            'id_categorie' => 'required|exists:categories,id',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($validated);
        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }
}
