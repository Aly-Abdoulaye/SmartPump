<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonDachat extends Model
{
    use HasFactory;

    protected $table = 'bons_dachat';

    protected $fillable = [
        'client_id',
        'montant',
        'date_emission',
        'date_expiration',
        'statut',
        'code_bon',
        'carburant_id',
        'quantite',
    ];
    
    public function carburant()
    {
        return $this->belongsTo(Carburant::class, 'carburant_id');
    }
    

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

