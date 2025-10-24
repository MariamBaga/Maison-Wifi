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
use App\Models\Product;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    $products = Product::all(); // récupère tous les produits
    return view('home1', compact('products'));
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
    $products = Product::all(); // récupère tous les produits
    return view('home1', compact('products'));
})->name('home.index');

Route::get('/aboutus', function () {
    return view('aboutsus');
})->name('aboutus');



Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');



// Liste de tous les produits


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'adminshow'])->name('admin.products.show');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


Route::middleware(['auth', 'role:admin'])->group(function () {
// Partie admin
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
// 🔒 Liste des produits pour l'administrateur uniquement

    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
});




// --- Côté public : affichage libre ---
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// --- Côté admin : gestion protégée ---
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/categories', [CategoryController::class, 'adminIndex'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});




// Afficher le panier


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







    Route::prefix('admin')->middleware(['auth','role:admin'])->name('admin.')->group(function() {
        Route::get('orders', [\App\Http\Controllers\AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{id}', [\App\Http\Controllers\AdminOrderController::class, 'show'])->name('orders.show');
        Route::patch('orders/{id}/status', [\App\Http\Controllers\AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::delete('orders/{id}', [\App\Http\Controllers\AdminOrderController::class, 'destroy'])->name('orders.destroy');
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
