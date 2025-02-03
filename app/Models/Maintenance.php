<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = ['pompe_id', 'date_intervention', 'type_intervention', 'technicien_id', 'statut', 'commentaires'];

    public function pompe()
    {
        return $this->belongsTo(Pompe::class);
    }

    public function technicien()
    {
        return $this->belongsTo(Utilisateur::class, 'technicien_id');
    }
}
