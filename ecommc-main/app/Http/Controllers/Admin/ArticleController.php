<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('admin.articles.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255|unique:articles',
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        // Chemin d'upload
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/articles'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
        // Création de l'article
        $article = Article::create($validatedData);
    
        return redirect()->route('admin.articles.index')->with('success', 'L\'article a été publié avec succès.');
    }
    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        return view('admin.articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|unique:articles,titre,' . $article->id,
            'contenu' => 'required|string',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        // Gestion de l'upload de l'image et suppression de l'ancienne si elle existe
        if ($request->hasFile('image')) {
            // Suppression de l'ancienne image si elle existe
            if ($article->image) {
                File::delete(public_path('assets/images/articles/' . $article->image));
            }
    
            // Stockage de la nouvelle image dans le répertoire spécifié
            $imageName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/articles'), $imageName);
            $validatedData['image'] = $imageName;
        }
    
        // Mise à jour de l'article
        $article->update($validatedData);
    
        return redirect()->route('admin.articles.index')->with('success', 'L\'article a été mis à jour avec succès.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        // Suppression de l'image du répertoire public
        if ($article->image) {
            File::delete(public_path('assets/images/articles/' . $article->image));
        }

        // Suppression de l'article
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'L\'article a été supprimé avec succès.');

    }
    
}
