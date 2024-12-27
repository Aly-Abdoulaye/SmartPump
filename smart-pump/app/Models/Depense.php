<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $fillable = ['station_id', 'montant', 'type', 'description', 'justificatif', 'date'];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
