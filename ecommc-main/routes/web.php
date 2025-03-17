<?php

use App\Http\Controllers\VisiteurController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;




// Routes publiques (accessibles sans authentification)
Route::middleware('RedirectIfAuthenticated')->group(function () {
    Route::get('/', [VisiteurController::class, 'accueil'])->name('accueil');
    Route::get('/service/{service}', [VisiteurController::class, 'showService'])->name('service.show');
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

        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        //Route::get('dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

        // Routes pour les utilisateurs
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
       
        // Routes pour les services
        Route::get('services', [ServiceController::class, 'index'])->name('admin.services.index');
        Route::get('services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('services/store', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::put('services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
        
        // Routes pour les prestataires
        Route::get('providers', [ProviderController::class, 'index'])->name('admin.providers.index');
        Route::get('providers/create', [ProviderController::class, 'create'])->name('admin.providers.create');
        Route::post('providers/store', [ProviderController::class, 'store'])->name('admin.providers.store');
        Route::get('providers/{provider}/show_edit', [ProviderController::class, 'showEdit'])->name('admin.providers.show_edit');
        Route::put('providers/{provider}', [ProviderController::class, 'update'])->name('admin.providers.update');
        Route::delete('providers/{id}', [ProviderController::class, 'destroy'])->name('admin.providers.destroy');
       
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
