<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupération de tous les articles
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Enregistrement d'un nouvel article
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Afficher un article à travers son id
        $article = Article::find($id);

        if(!article) {
            return response()->json(['message' => 'Article non trouvé!'], 404);
        }
        return $article;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Modification d'un article
        $article = Article::find($id);

        if(!article) {
            return response()->json(['message' => 'article non trouvé!'], 404);
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $request->update($request->all());
        return $article;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
