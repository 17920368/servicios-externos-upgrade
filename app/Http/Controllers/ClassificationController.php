<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function index(Request $request)
    {
        $classifications = Classification::paginate(10);
        if ($request->search) {
            $classifications = Classification::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('classification.index', compact('classifications'));
    }

    public function create()
    {
        return view('classification.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $classification = new Classification();
        $classification->name = $request->name;
        $classification->save();
        return redirect()->route('giro.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $classification = Classification::find($id);
        if ($classification != null) {
            return view('classification.edit', compact('classification'));
        }
    }
    public function update(Request $request, $id)
    {
        $classification = Classification::find($id);
        if ($classification != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $classification->name = $request->name;
            $classification->save();
            return redirect()->route('giro.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $classification = Classification::find($id);
        if ($classification != null) {
            $classification->delete();
        }
        return redirect()->route('giro.index')->with('success', 'Éxito al eliminar.');
    }
}
