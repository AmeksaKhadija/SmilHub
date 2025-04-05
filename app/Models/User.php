<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'tele',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

   
    public function isPatient()
    {
        return $this->role === 'patient';
    }

    public function isDentist()
    {
        return $this->role === 'dentiste';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function patient()
    {
        return $this->hasOne(Patient::class, 'utilisateur_id');
    }

    public function dentist()
    {
        return $this->hasOne(Dentist::class, 'utilisateur_id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'utilisateur_id');
    }
}
