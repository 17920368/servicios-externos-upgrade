<?php

namespace App\Http\Controllers;

use App\Models\AgreementType;
use Illuminate\Http\Request;

class AgreementTypeController extends Controller
{
    public function index()
    {
        $agreements_types = AgreementType::all();
        return view('agreement_type.index', compact('agreements_types'));
    }

    public function create()
    {
        return view('agreement_type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $agreement_type = new AgreementType();
        $agreement_type->name = $request->name;
        $agreement_type->save();
        return redirect()->route('');
    }
    public function edit($id)
    {
        $agreement_type = AgreementType::find($id);
        if ($agreement_type != 0) {
            return view('agreement_type.edit', compact('agreement_type'));
        }
    }
    public function update(Request $request, $id)
    {
        $agreement_type = AgreementType::find($id);
        if ($agreement_type != 0) {
            $request->validate([
                'name' => 'required'
            ]);
            $agreement_type = new AgreementType();
            $agreement_type->name = $request->name;
            $agreement_type->save();
            return redirect()->route('');
        }
        return redirect()->route('');
    }
    public function delete($id)
    {
        $agreement_type = AgreementType::find($id);
        if ($agreement_type != 0) {
            $agreement_type->delete();
        }
        return redirect()->route('');
    }
}
