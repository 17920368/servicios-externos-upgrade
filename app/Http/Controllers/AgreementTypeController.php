<?php

namespace App\Http\Controllers;

use App\Models\AgreementType;
use Illuminate\Http\Request;

class AgreementTypeController extends Controller
{
    public function index(Request $request)
    {
        $agreements_types = AgreementType::paginate(10);
        $search_to_word = "";
        if ($request->search) {
            $search_to_word = $request->search;
            $agreements_types = AgreementType::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('agreement_type.index', compact('agreements_types', 'search_to_word'));
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
        return redirect()->route('tipo-convenio.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $agreement_type = AgreementType::find($id);
        if ($agreement_type != null) {
            return view('agreement_type.edit', compact('agreement_type'));
        }
    }
    public function update(Request $request, $id)
    {
        $agreement_type = AgreementType::find($id);
        if ($agreement_type != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $agreement_type->name = $request->name;
            $agreement_type->save();
            return redirect()->route('tipo-convenio.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $agreement_type = AgreementType::find($id);
        if ($agreement_type != null) {
            $agreement_type->delete();
        }
        return redirect()->route('tipo-convenio.index')->with('success', 'Éxito al eliminar.');
    }
}
