<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends User
{
    use HasFactory;

    protected $fillable = [
        'utilisateur_id',
        'speciality',
        'available_slots',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    // public function getNom(Dentist $dentist)
    // {
    //     $id = $dentist->utilisateur_id;
    //     $user = User::find($id);
    //     // dd($user);
    //     return $user->nom;
    // }

    // public function getPrenom(Dentist $dentist)
    // {
    //     $id = $dentist->utilisateur_id;
    //     $user = User::find($id);
    //     // dd($user);
    //     return $user->prenom;
    // }

    public function getAvailableSlotsArrayAttribute()
    {
        return json_decode($this->available_slots, true) ?: [];
    }
}
