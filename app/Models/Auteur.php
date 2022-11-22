<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auteur extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Empêche _aucune_ colonne d'être remplie
    protected $guarded = [];


    // Scope local, on appelle via ->active()
    public function scopeActive(Builder $query)
    {
        return $query->where('active', 1);
    }

    public function scopeMajeur(Builder $query)
    {
        return $query->where('ddn', '<', now()->subYears(18));
    }

    // Ajout d'un scope global
    protected static function booted()
    {
        static::addGlobalScope('ancient', function (Builder $builder) {
            $builder->where('created_at', '>', now()->subYears(2000));
        });
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function editeur()
    {
        return $this->belongsToMany(
            Editeur::class, 
            'auteurs_editeurs', 
            'auteur_id', 
            'editeur_id');
    }
}
