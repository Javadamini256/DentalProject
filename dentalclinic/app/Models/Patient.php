<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['regNumber', 'name', 'lastName', 'fatherName', 'doctor_id', 'image', 'phone', 'age', 'IDNumber', 'bloodType', 'marriage', 'pregnant', 'education', 'gender', 'address', 'surgeryHistory', 'systemicDisease_id', 'systemicDisease_description', 'registrationDate'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
    public function systemic()
    {
        return $this->belongsTo(Systemic::class);
    }


}
