<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    protected $fillable = [
        'service_id',
        'titre',
        'description',
        'type_contrat',
        'date_limite',
        'statut',
    ];

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }   
}
