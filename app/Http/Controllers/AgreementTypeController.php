<?php

namespace App\Http\Controllers;

use App\Models\AgreementType;
use Illuminate\Http\Request;

class AgreementTypeController extends Controller
{
    public function index()
    {
        $agreements_type = AgreementType::all();
        return $agreements_type;
    }
}
