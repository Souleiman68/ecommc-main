<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_categorie',
        'image',
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'category_provider', 'categorie_id', 'provider_id');
    }

    // Ajoutez cette méthode pour obtenir l'URL complète de l'image
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('assets/images/categories/' . $this->image);
        }
        return null;
    }
}