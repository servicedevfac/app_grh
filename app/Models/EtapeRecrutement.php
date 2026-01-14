<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtapeRecrutement extends Model
{
    protected $fillable = [
        'nom_etape',
        'ordre',
    ];
}
