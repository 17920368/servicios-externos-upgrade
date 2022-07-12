<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $areas = Area::paginate(10);
        if ($request->search) {
            $areas = Area::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('area.index', compact('areas'));
    }

    public function create()
    {
        return view('area.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $area = new Area();
        $area->name = $request->name;
        $area->save();
        return redirect()->route('area.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $area = Area::find($id);
        if ($area != null) {
            return view('area.edit', compact('area'));
        }
    }
    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        if ($area != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $area->name = $request->name;
            $area->save();
            return redirect()->route('area.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $area = Area::find($id);
        if ($area != null) {
            $area->delete();
        }
        return redirect()->route('area.index')->with('success', 'Éxito al eliminar.');
    }
}
