<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'treatment_id',
        'doctor_id',
        'date',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan treatment
    public function treatment()
    {
        return $this->belongsTo(Treatment::class);
    }

    // Relasi dengan doctor
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
