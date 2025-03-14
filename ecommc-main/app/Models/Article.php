<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'prix',
        'categorie_id',
        'image',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
