<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = ['cuve_id', 'pompe_id', 'utilisateur_id', 'quantite', 'montant', 'date'];

    public function cuve()
    {
        return $this->belongsTo(Cuve::class);
    }

    public function pompe()
    {
        return $this->belongsTo(Pompe::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
