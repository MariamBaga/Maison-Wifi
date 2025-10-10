<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 🏠 Liste des articles
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // ➕ Formulaire d’ajout d’article
    public function create()
    {
        return view('posts.create');
    }

    // 💾 Enregistrer un nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Article ajouté avec succès.');
    }

    // 📄 Afficher un article
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // ✏️ Formulaire d’édition
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // 🔁 Mettre à jour un article
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Article mis à jour avec succès.');
    }

    // ❌ Supprimer un article
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Article supprimé avec succès.');
    }
}
