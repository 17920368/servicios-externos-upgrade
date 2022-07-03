<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index(Request $request)
    {
        $sectors = Sector::paginate(10);
        if ($request->search) {
            $sectors = Sector::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('sector.index', compact('sectors'));
    }

    public function create()
    {
        return view('sector.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $sector = new Sector();
        $sector->name = $request->name;
        $sector->save();
        return redirect()->route('sector.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $sector = Sector::find($id);
        if ($sector != null) {
            return view('sector.edit', compact('sector'));
        }
    }
    public function update(Request $request, $id)
    {
        $sector = Sector::find($id);
        if ($sector != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $sector->name = $request->name;
            $sector->save();
            return redirect()->route('sector.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $sector = Sector::find($id);
        if ($sector != null) {
            $sector->delete();
        }
        return redirect()->route('sector.index')->with('success', 'Éxito al eliminar.');
    }
}
