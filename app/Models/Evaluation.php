<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'candidature_id',
        'employe_id',
        'date_evaluation',
        'commentaires',
        'note',
    ];
}
