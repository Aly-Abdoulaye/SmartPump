<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carburant extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix_unitaire'];

    public function bonsDachat()
    {
        return $this->hasMany(BonDachat::class, 'carburant_id');
    }
    public function cuves()
    {
        return $this->hasMany(Cuve::class);
    }

}
