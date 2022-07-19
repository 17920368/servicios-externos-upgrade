<?php

namespace App\Http\Controllers;

use App\Models\SysadIndicator;
use Illuminate\Http\Request;

class SysadIndicatorController extends Controller
{
    public function index(Request $request)
    {
        $indicators = SysadIndicator::paginate(10);
        if ($request->search) {
            $indicators = SysadIndicator::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('sysad_indicator.index', compact('indicators'));
    }

    public function create()
    {
        return view('sysad_indicator.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $indicator = new SysadIndicator();
        $indicator->name = $request->name;
        $indicator->description = $request->description;
        $indicator->save();
        return redirect()->route('indicador-sysad.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $indicator = SysadIndicator::find($id);
        if ($indicator != null) {
            return view('sysad_indicator.edit', compact('indicator'));
        }
    }
    public function update(Request $request, $id)
    {
        $indicator = SysadIndicator::find($id);
        if ($indicator != null) {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            $indicator->name = $request->name;
            $indicator->description = $request->description;
            $indicator->save();
            return redirect()->route('indicador-sysad.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $indicator = SysadIndicator::find($id);
        if ($indicator != null) {
            $indicator->delete();
        }
        return redirect()->route('indicador-sysad.index')->with('success', 'Éxito al eliminar.');
    }
}
