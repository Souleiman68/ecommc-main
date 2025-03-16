<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_complet',
        'date_naissance',
        'lieu_naissance',
        'region_actuelle',
        'telephone',
        'whatsapp',
        'description',
    ];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Les attributs qui doivent être convertis en types natifs.
     *
     * @var array
     */
    protected $casts = [
        'date_naissance' => 'date',
    ];

    /**
     * Les catégories auxquelles ce prestataire est associé.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'category_provider');
    }

    /**
     * Les services offerts par ce prestataire.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Récupère l'âge du prestataire.
     *
     * @return int
     */
    public function getAgeAttribute(): int
    {
        return now()->diffInYears($this->date_naissance);
    }

    /**
     * Récupère le numéro de téléphone formaté.
     *
     * @return string
     */
    public function getTelephoneFormateAttribute(): string
    {
        return '+222 ' . substr($this->telephone, 0, 2) . ' ' . substr($this->telephone, 2, 2) . ' ' . substr($this->telephone, 4);
    }
}