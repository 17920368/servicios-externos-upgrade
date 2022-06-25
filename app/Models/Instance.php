<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                           Relation with Agreement                          */
    /* -------------------------------------------------------------------------- */
    public function agreements()
    {
        return $this->hasMany(Agreement::class, 'id');
    }
    /* -------------------------------------------------------------------------- */
    /*                            Relation with Scopes                            */
    /* -------------------------------------------------------------------------- */
    public function scopes()
    {
        return $this->belongsTo(Scope::class, 'scope_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                            Relation with Sectors                           */
    /* -------------------------------------------------------------------------- */
    public function sectors()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                         Relation with Sectors Types                        */
    /* -------------------------------------------------------------------------- */
    public function sectors_types()
    {
        return $this->belongsTo(SectorType::class, 'sector_type_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                             Relation with Sizes                            */
    /* -------------------------------------------------------------------------- */
    public function sizes()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                             Relation with Classification                   */
    /* -------------------------------------------------------------------------- */
    public function classifications()
    {
        return $this->belongsTo(Classification::class, 'area_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                             Relation with Areas                            */
    /* -------------------------------------------------------------------------- */
    public function areas()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
