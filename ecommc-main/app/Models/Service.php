<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 
        'contenu', 
        'prix', 
        'categorie_id', 
        'image', 
        'phone',
        'location'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Génère automatiquement le lien WhatsApp
    public function getWhatsappLinkAttribute()
    {
        $message = urlencode("Bonjour, je suis intéressé par votre service : {$this->titre}");
        return "https://wa.me/{$this->phone}?text={$message}";
    }
}