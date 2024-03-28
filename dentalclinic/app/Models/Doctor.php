<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable=['name','lastName','phone','birthDay','description','gender'];

    public function patient()
    {
        return $this->hasMany(Patient::class, 'doctor_id');
    }
    
}
