<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends user
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'medical_history',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
