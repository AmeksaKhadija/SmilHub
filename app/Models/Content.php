<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'type',
        'dentist_id',
        'categorie_id',
    ];

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }


}
