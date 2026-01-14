<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
        'recrutement_id',
        'nom',
        'prenom',
        'email',
        'phone',
        'cv_path',
        'lettre_motivation_path',
        'statut',
    ];

    public function recrutements()
    {
        return $this->belongsTo(Recrutement::class);
    }
}
