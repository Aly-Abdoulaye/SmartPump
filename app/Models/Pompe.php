<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pompe extends Model
{
    use HasFactory;

    protected $fillable = ['station_id', 'index_volucompteur', 'nombre_pistolets', 'type_pompe', 'etat'];

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
        return $this->hasMany(Maintenance::class);
    }
}
