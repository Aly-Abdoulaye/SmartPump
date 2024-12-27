<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonDachat extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'montant', 'date_emission', 'date_expiration', 'statut', 'code_bon'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

