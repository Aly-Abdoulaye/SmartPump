<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'email', 'mot_de_passe', 'role', 'station_id', 'statut'];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class, 'technicien_id');
    }
}

