<?php

namespace App\Repositories\Interfaces;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Collection;

interface CategorieRepositoryInterface
{
    public function getAllCategories(): Collection;
    public function getCategorieById(int $id): ?Categorie;
    public function createCategorie(array $data): Categorie;
    public function updateCategorie(Categorie $categorie, array $data): bool;
    public function deleteCategorie(Categorie $categorie): bool;
    public function hasContents(Categorie $categorie): bool;
}
