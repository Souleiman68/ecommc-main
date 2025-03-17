<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    // Supprimez cette méthode
    // /**
    //  * La catégorie à laquelle ce service appartient.
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function categorie()
    // {
    //     return $this->belongsTo(Categorie::class);
    // }
}