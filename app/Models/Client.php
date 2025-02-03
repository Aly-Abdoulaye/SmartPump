<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'coordonnees', 'solde_compte'];

    public function bonsDachat()
    {
        return $this->hasMany(BonDachat::class);
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }
}

