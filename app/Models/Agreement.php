<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;
    /* -------------------------------------------------------------------------- */
    /*                    Relation Agreement and Agreement Type                   */
    /* -------------------------------------------------------------------------- */
    public function agreements_types()
    {
        return $this->belongsTo(AgreementType::class, 'agreement_type_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                    Relation Agreement and Indicator                        */
    /* -------------------------------------------------------------------------- */
    public function instances()
    {
        return $this->belongsTo(Instance::class, 'instance_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                    Relation Agreement and Indicator                        */
    /* -------------------------------------------------------------------------- */
    public function indicators()
    {
        return $this->belongsTo(Indicator::class, 'indicator_id');
    }
    /* -------------------------------------------------------------------------- */
    /*                    Relation Agreement and User                             */
    /* -------------------------------------------------------------------------- */
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
