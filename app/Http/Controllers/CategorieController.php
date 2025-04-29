<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('./admin/categories', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);

        // dd($request);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = Categorie::create([
            'name' => $request->name,
            'description_courte' => $request->description,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie créée avec succès!');
    }

    /**
     * Display the specified category.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('admin.categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name,' . $categorie->id,
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $categorie->update([
            'name' => $request->name,
            'description_courte' => $request->description,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie mise à jour avec succès!');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        // Check if category has contents
        if ($categorie->contents()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle contient des articles.');
        }

        $categorie->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie supprimée avec succès!');
    }

    /**
     * Get all categories
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllCategories()
    {
        $categories = Categorie::all();

        return response()->json([
            'success' => true,
            'data' => $categories
        ]);
    }
}
