<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'localisation', 'code_station', 'etat', 'id_user'];

    public function cuves()
    {
        return $this->hasMany(Cuve::class);
    }

    public function pompes()
    {
        return $this->hasMany(Pompe::class);
    }

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }

    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}
