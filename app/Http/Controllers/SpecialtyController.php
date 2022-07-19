<?php

namespace App\Http\Controllers;

use App\Models\Specialty;

use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function index(Request $request)
    {
        $specialties = Specialty::paginate(10);
        if ($request->search) {
            $specialties = Specialty::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('specialty.index', compact('specialties'));
    }

    public function create()
    {
        return view('specialty.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $specialty = new Specialty();
        $specialty->name = $request->name;
        $specialty->save();
        return redirect()->route('carrera.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $specialty = Specialty::find($id);
        if ($specialty != null) {
            return view('specialty.edit', compact('specialty'));
        }
    }
    public function update(Request $request, $id)
    {
        $specialty = Specialty::find($id);
        if ($specialty != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $specialty->name = $request->name;
            $specialty->save();
            return redirect()->route('carrera.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $specialty = Specialty::find($id);
        if ($specialty != null) {
            $specialty->delete();
        }
        return redirect()->route('carrera.index')->with('success', 'Éxito al eliminar.');
    }
}
