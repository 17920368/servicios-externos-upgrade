<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                           Relation with instance                           */
    /* -------------------------------------------------------------------------- */
    public function agreements()
    {
        return $this->hasMany(Agreement::class, 'id');
    }
}
