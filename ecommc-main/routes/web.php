<?php

use App\Http\Controllers\VisiteurController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ArticleController;

use Illuminate\Support\Facades\Route;




// Routes publiques (accessibles sans authentification)
Route::middleware('RedirectIfAuthenticated')->group(function () {
    Route::get('/', [VisiteurController::class, 'accueil'])->name('accueil');
    Route::get('/categories', [VisiteurController::class, 'categories'])->name('categories');
    Route::get('/articles', [VisiteurController::class, 'articles'])->name('articles');
    Route::get('/articles/{articles}', [VisiteurController::class, 'showArticle'])->name('show.article');
    Route::get('/categorie/articles/{categorie}', [VisiteurController::class, 'articlesByCategorie'])->name('articles.by.categorie');
});

// Routes pour les invités (non connectés)
Route::middleware(['guest', 'prevent-back-history'])->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login/process', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

// Routes pour les utilisateurs authentifiés
Route::middleware(['auth', 'prevent-back-history', 'RedirectIfNotAuthenticated'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
        
        // Gestion des articles
        Route::get('articles', [ArticleController::class, 'index'])->name('admin.articles.index');
        Route::get('articles/create', [ArticleController::class, 'create'])->name('admin.articles.create');
        Route::post('articles/push', [ArticleController::class, 'store'])->name('admin.articles.store');
        Route::get('articles/edit/{article}', [ArticleController::class, 'edit'])->name('admin.articles.edit');
        Route::put('articles/{article}', [ArticleController::class, 'update'])->name('admin.articles.update');
        Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('admin.articles.destroy');

        // Gestion des catégories
        Route::get('categories', [CategorieController::class, 'index'])->name('admin.categories.index');
        Route::get('categories/create', [CategorieController::class, 'create'])->name('admin.categories.create');
        Route::post('categories/store', [CategorieController::class, 'store'])->name('admin.categories.store');
        Route::get('categories/{id}/edit', [CategorieController::class, 'edit'])->name('admin.categories.edit');
        Route::put('categories/{categorie}', [CategorieController::class, 'update'])->name('admin.categories.update');
        Route::delete('categories/{id}', [CategorieController::class, 'destroy'])->name('admin.categories.destroy');
    });

    // Route de déconnexion
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
