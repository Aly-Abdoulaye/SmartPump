<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'localisation',
        'code_station',
        'status',       // au lieu de "etat"
        'gerant_id',    // au lieu de "id_user"
    ];

    // Génération automatique du code station lors de la création
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($station) {
            $station->code_station = self::generateCode($station->nom, $station->localisation);
        });
    }

    // Méthode pour générer le code station (3 lettres nom + numéro + 3 lettres localisation)
    public static function generateCode($nom, $localisation)
    {
        $nomPart = strtoupper(substr($nom, 0, 3)); // 3 premières lettres du nom
        $locPart = strtoupper(substr($localisation, 0, 3)); // 3 premières lettres de la localisation

        $lastStation = self::orderBy('id', 'desc')->first();
        $nextNumber = $lastStation ? intval(substr($lastStation->code_station, 3, 3)) + 1 : 1;
        $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        return $nomPart . $formattedNumber . $locPart;
    }

    // Relation : Une station a plusieurs cuves
    public function cuves()
    {
        return $this->hasMany(Cuve::class);
    }
    

    // Relation : Une station a plusieurs pompes
    public function pompes()
    {
        return $this->hasMany(Pompe::class);
    }

    // Relation : Une station a un seul gérant
    public function gerant()
    {
        return $this->belongsTo(User::class, 'gerant_id');
    }

    // Relation : Une station a plusieurs dépenses
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }

    // Relation : Une station a plusieurs utilisateurs (employés) si besoin
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
