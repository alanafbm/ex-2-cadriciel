<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Editeur extends Model
{
    use HasFactory;

        // Permet le remplissage des propriétés suivantes
        protected $fillable = [
            'nom',
            'id'
        ];

        protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('created_at', '>', now()->subYears(2000));
        });
    }
    public function auteur()
    {
        return $this->belongsToMany(
            Auteur::class, 
            'auteurs_editeurs', 
            'editeur_id',
            'auteur_id');
    }
}
