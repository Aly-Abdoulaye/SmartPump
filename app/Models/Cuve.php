<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuve extends Model
{
    use HasFactory;

    protected $fillable = ['station_id', 'capacite', 'niveau_actuel', 'seuil_minimum', 'type_carburant'];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}

