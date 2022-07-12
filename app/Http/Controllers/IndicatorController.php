<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    public function index(Request $request)
    {
        $indicators = Indicator::paginate(10);
        if ($request->search) {
            $indicators = Indicator::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('indicator.index', compact('indicators'));
    }

    public function create()
    {
        return view('indicator.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $indicator = new Indicator();
        $indicator->name = $request->name;
        $indicator->description = $request->description;
        $indicator->save();
        return redirect()->route('indicador.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $indicator = Indicator::find($id);
        if ($indicator != null) {
            return view('indicator.edit', compact('indicator'));
        }
    }
    public function update(Request $request, $id)
    {
        $indicator = Indicator::find($id);
        if ($indicator != null) {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            $indicator->name = $request->name;
            $indicator->description = $request->description;
            $indicator->save();
            return redirect()->route('indicador.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $indicator = Indicator::find($id);
        if ($indicator != null) {
            $indicator->delete();
        }
        return redirect()->route('indicador.index')->with('success', 'Éxito al eliminar.');
    }
}
