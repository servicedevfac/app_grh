<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $fillable = [
        'candidature_id',
        'date_entretien',
        'lieu',
        'commentaires',
        'type',
    ];

    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
}
