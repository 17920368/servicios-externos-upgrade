<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        $sizes = Size::paginate(10);
        $search_to_word = "";
        if ($request->search) {
            $search_to_word = $request->search;
            $sizes = Size::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('size.index', compact('sizes', 'search_to_word'));
    }

    public function create()
    {
        return view('size.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $size = new Size();
        $size->name = $request->name;
        $size->save();
        return redirect()->route('tamanio.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $size = Size::find($id);
        if ($size != null) {
            return view('size.edit', compact('size'));
        }
    }
    public function update(Request $request, $id)
    {
        $size = Size::find($id);
        if ($size != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $size->name = $request->name;
            $size->save();
            return redirect()->route('tamanio.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $size = Size::find($id);
        if ($size != null) {
            $size->delete();
        }
        return redirect()->route('tamanio.index')->with('success', 'Éxito al eliminar.');
    }
}
