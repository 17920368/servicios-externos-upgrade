<?php

namespace App\Http\Controllers;

use App\Models\SectorType;
use Illuminate\Http\Request;

class SectorTypeController extends Controller
{
    public function index(Request $request)
    {
        $sectors_types = SectorType::paginate(10);
        if ($request->search) {
            $sectors_types = SectorType::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('sector-type.index', compact('sectors_types'));
    }

    public function create()
    {
        return view('sector-type.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $sector_type = new SectorType();
        $sector_type->name = $request->name;
        $sector_type->save();
        return redirect()->route('tipo-sector.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $sector_type = SectorType::find($id);
        if ($sector_type != null) {
            return view('sector-type.edit', compact('sector_type'));
        }
    }
    public function update(Request $request, $id)
    {
        $sector_type = SectorType::find($id);
        if ($sector_type != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $sector_type->name = $request->name;
            $sector_type->save();
            return redirect()->route('tipo-sector.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $sector_type = SectorType::find($id);
        if ($sector_type != null) {
            $sector_type->delete();
        }
        return redirect()->route('tipo-sector.index')->with('success', 'Éxito al eliminar.');
    }
}
