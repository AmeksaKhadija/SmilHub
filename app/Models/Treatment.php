<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'description',
        'medications',
    ];


    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
