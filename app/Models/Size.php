<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                           Relation with Instances                          */
    /* -------------------------------------------------------------------------- */
    public function instances()
    {
        return $this->hasMany(Instance::class, 'id');
    }
}
