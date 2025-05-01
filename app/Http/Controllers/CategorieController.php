<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategorieRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{

    protected $categorieRepository;

    public function __construct(CategorieRepositoryInterface $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categorieRepository->getAllCategories();
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

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->categorieRepository->createCategorie($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie créée avec succès!');
    }

    /**
     * Display the specified category.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = $this->categorieRepository->getCategorieById($id);

        if (!$categorie) {
            return redirect()->route('categories.index')
                ->with('error', 'Catégorie non trouvée.');
        }

        return view('admin.categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = $this->categorieRepository->getCategorieById($id);

        if (!$categorie) {
            return redirect()->route('categories.index')
                ->with('error', 'Catégorie non trouvée.');
        }

        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = $this->categorieRepository->getCategorieById($id);

        if (!$categorie) {
            return redirect()->route('categories.index')
                ->with('error', 'Catégorie non trouvée.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $this->categorieRepository->updateCategorie($categorie, $request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie mise à jour avec succès!');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \App\Models\Categorie  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = $this->categorieRepository->getCategorieById($id);

        if (!$categorie) {
            return redirect()->route('categories.index')
                ->with('error', 'Catégorie non trouvée.');
        }

        // Check if category has contents
        if ($this->categorieRepository->hasContents($categorie)) {
            return redirect()->route('categories.index')
                ->with('error', 'Impossible de supprimer cette catégorie car elle contient des articles.');
        }

        $this->categorieRepository->deleteCategorie($categorie);

        return redirect()->route('categories.index')
            ->with('success', 'Catégorie supprimée avec succès!');
    }
}
