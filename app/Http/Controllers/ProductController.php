<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Affiche la liste des produits
    public function index()
    {
         // Charge les produits avec leur catégorie et pagine par 12 par page
    $products = Product::with('category')->paginate(4);
        return view('products.index', compact('products'));
    }

    // Affiche un produit spécifique
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        return view('admin.products.create');
    }

    // Enregistre un nouveau produit
   // Dans la méthode store
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validation image
    ]);

    // Générer le slug automatiquement
    $validated['slug'] = Str::slug($validated['name'], '-');

    // Gérer le téléchargement de l'image
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('products', 'public'); // stocke dans storage/app/public/products
        $validated['image'] = $path;
    }

    Product::create($validated);

    return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
}


    // Affiche le formulaire de modification
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    // Dans la méthode update
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $validated['slug'] = Str::slug($validated['name'], '-');

    // Gérer le téléchargement de l'image
    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $path = $request->file('image')->store('products', 'public');
        $validated['image'] = $path;
    }

    $product->update($validated);

    return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
}

    // Supprime un produit
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
