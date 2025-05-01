<?php

namespace App\Repositories;

use App\Models\Categorie;
use App\Repositories\Interfaces\CategorieRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategorieRepository implements CategorieRepositoryInterface
{
    protected $model;

    public function __construct(Categorie $categorie)
    {
        $this->model = $categorie;
    }

    public function getAllCategories(): Collection
    {
        return $this->model->all();
    }

    public function getCategorieById(int $id): ?Categorie
    {
        return $this->model->find($id);
    }

    public function createCategorie(array $data): Categorie
    {
        return $this->model->create([
            'name' => $data['name'],
            'description_courte' => $data['description'],
        ]);
    }

    public function updateCategorie(Categorie $categorie, array $data): bool
    {
        return $categorie->update([
            'name' => $data['name'],
            'description_courte' => $data['description'],
        ]);
    }

    public function deleteCategorie(Categorie $categorie): bool
    {
        return $categorie->delete();
    }

    public function hasContents(Categorie $categorie): bool
    {
        return $categorie->contents()->count() > 0;
    }
}
