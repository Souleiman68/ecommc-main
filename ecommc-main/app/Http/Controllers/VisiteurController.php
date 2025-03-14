<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{

    public function accueil()
    {
        $HeroSectionImages = Article::all();
        $articles = Article::orderBy('created_at', 'desc')->take(9)->get();
        return view('visiteurs.accueil', compact('articles', 'HeroSectionImages'));
    }


    public function showArticle($id)
    {   
        $article = Article::findOrFail($id);
        $articles = Article::orderBy('created_at', 'desc')->take(6)->get();
        return view('visiteurs.showArticle', [
            'article' => $article,
            'articles' => $articles
        ]);
    }

    public function categories()
    {
        return view('visiteurs.categories');
    }

    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(9);
        return view('visiteurs.articles', compact('articles'));
    }


    public function articlesByCategorie($id)
    {
        $articles = Article::where('categorie_id', $id)->orderBy('created_at', 'desc')->get();
        $categorie = Categorie::findOrFail($id);
        return view('visiteurs.ArticlesByCategorie', compact('articles', 'categorie'));
    }

}
