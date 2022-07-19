<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                         Relation Specialty and Agreement                   */
    /* -------------------------------------------------------------------------- */
    public function agreement_specialty()
    {
        return $this->belongsToMany(Agreement::class, 'agreements_specialties');
    }
}
