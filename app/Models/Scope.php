<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                           Relation with Instance                           */
    /* -------------------------------------------------------------------------- */
    public function instances()
    {
        return $this->hasMany(Instance::class, 'id');
    }
}
