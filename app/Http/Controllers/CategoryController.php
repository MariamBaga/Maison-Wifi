<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    // --- LISTE PUBLIQUE ---
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    // --- DETAIL PUBLIQUE ---
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // --- LISTE ADMIN ---
    public function adminIndex()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    // --- FORMULAIRE DE CREATION ---
    public function create()
    {
        return view('admin.categories.create');
    }

    // --- SAUVEGARDE ---
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    // --- FORMULAIRE D'EDITION ---
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // --- MISE À JOUR ---
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    // --- SUPPRESSION ---
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée.');
    }
}
