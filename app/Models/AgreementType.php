<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementType extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                           Relation with Agreement                          */
    /* -------------------------------------------------------------------------- */
    public function agreements()
    {
        return $this->hasMany(Agreement::class, 'id');
    }
}
