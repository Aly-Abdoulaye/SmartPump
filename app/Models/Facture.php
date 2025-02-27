<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'periode', 'montant_total', 'statut', 'date_emission', 'lien_pdf'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
