<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Permet le remplissage des propriétés suivantes
    protected $fillable = [
        'auteur_id',
        'titre',
        'date_pub',
        'resume'
    ];

    public function auteur()
    {
        return $this->belongsTo(Publication::class);
    }
}
