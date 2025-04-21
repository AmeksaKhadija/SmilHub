<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        'dentist_id',
        'category_id',
        'image',
    ];

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
}
