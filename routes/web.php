<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// routes/web.php ou routes/api.php
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
// routes/web.php ou routes/api.php
use App\Http\Controllers\PostController;
// routes/web.php ou routes/api.php
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'role:admin'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    return view('home1');
})->name('home.index');

Route::get('/aboutus', function () {
    return view('aboutsus');
})->name('aboutus');



Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');



// Liste de tous les produits


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Partie admin
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');



// Liste de toutes les catégories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

// Formulaire pour ajouter une nouvelle catégorie
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

// Enregistrer une nouvelle catégorie
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Détail d’une catégorie
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Formulaire de modification
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

// Mettre à jour une catégorie
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// Supprimer une catégorie
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');






// Afficher le panier

Route::middleware(['auth'])->group(function () {
    // 🛒 Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // 💖 Wishlist
    Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
});










// Liste des commandes du client
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

// Détail d’une commande
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

// Créer une commande depuis le panier
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// Annuler une commande
Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');







Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');



// Afficher le formulaire de contact
Route::get('/contact', function () {
    return view('contact'); // resources/views/contact.blade.php
})->name('contact.form');

// Envoi du formulaire
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin : liste des messages
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Voir un message
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

// Marquer comme lu
Route::post('/contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('contacts.read');

// Supprimer un message
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


require __DIR__.'/auth.php';
