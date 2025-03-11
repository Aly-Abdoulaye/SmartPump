<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuve extends Model
{
    use HasFactory;

    protected $fillable = [
        'station_id',
        'carburant_id',
        'capacite',
        'niveau_actuel',
        'seuil_minimum',
    ];

    // Une cuve appartient à une station
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    // Une cuve contient un type de carburant
    public function carburant()
    {
        return $this->belongsTo(Carburant::class);
    }

    // Vérifie si la cuve est en alerte (niveau < seuil)
    public function estEnAlerte()
    {
        return $this->niveau_actuel < $this->seuil_minimum;
    }
}
