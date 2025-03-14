<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_categorie',
    ];

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
