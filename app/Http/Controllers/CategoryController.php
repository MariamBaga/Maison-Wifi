<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 🏠 Liste des catégories
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // 📄 Afficher une catégorie
    public function show($id) {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // ➕ Formulaire d’ajout
    public function create() {
        return view('categories.create');
    }

    // 💾 Enregistrer une nouvelle catégorie
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    // ✏️ Formulaire de modification
    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // 🔁 Mettre à jour une catégorie
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    // ❌ Supprimer une catégorie
    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
