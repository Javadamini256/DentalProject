<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Systemic extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function patient()
    {
        return $this->hasMany(Patient::class, 'systemic_id');
    }
}
