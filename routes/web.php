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

// --- ROUTES PUBLIQUES ---
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// --- ROUTES ADMIN ---
Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    // Liste des produits admin
    Route::get('/products', [ProductController::class, 'adminIndex'])->name('products.index');

    // Détails d’un produit admin
    Route::get('/products/{id}', [ProductController::class, 'adminshow'])->name('products.show');

    // CRUD
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
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





    Route::get('/commander', [OrderController::class, 'checkoutindex'])->name('checkout.index');


// ================= CLIENT =================
Route::middleware(['auth'])->group(function () {
    Route::get('/mes-commandes', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/mes-commandes/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/commande', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/commande/{id}/annuler', [OrderController::class, 'cancel'])->name('orders.cancel');
});

// ================= ADMIN =================
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'adminShow'])->name('admin.orders.show'); // 
    Route::post('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
});








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
