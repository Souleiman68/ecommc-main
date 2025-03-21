<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titre',
        'description',
        'prix',
        'provider_id',
        'localisation',
        'image',
    ];

    /**
     * Le prestataire qui offre ce service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * Les catégories auxquelles ce service appartient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class, 'category_service');
    }

    /**
     * Accesseur pour formater le prix.
     *
     * @return string
     */
    public function getPrixFormateAttribute(): string
    {
        return number_format($this->prix, 0, ',', ' ') . ' MRU';
    }
}