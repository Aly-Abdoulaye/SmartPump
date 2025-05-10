<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compagnie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'logo',
        'adresse',
    ];

public function users()
{
    return $this->hasMany(User::class);
}
    
public function stations()
    {
        return $this->hasMany(Station::class);
    }
    
}
