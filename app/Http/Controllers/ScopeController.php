<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use Illuminate\Http\Request;

class ScopeController extends Controller
{
    public function index(Request $request)
    {
        $scopes = Scope::paginate(10);
        $search_to_word = "";
        if ($request->search) {
            $search_to_word = $request->search;
            $scopes = Scope::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('scope.index', compact('scopes', 'search_to_word'));
    }

    public function create()
    {
        return view('scope.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $scope = new Scope();
        $scope->name = $request->name;
        $scope->save();
        return redirect()->route('alcance.index')->with('success', 'Éxito al agregar.');
    }
    public function edit($id)
    {
        $scope = Scope::find($id);
        if ($scope != null) {
            return view('scope.edit', compact('scope'));
        }
    }
    public function update(Request $request, $id)
    {
        $scope = Scope::find($id);
        if ($scope != null) {
            $request->validate([
                'name' => 'required'
            ]);
            $scope->name = $request->name;
            $scope->save();
            return redirect()->route('alcance.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $scope = Scope::find($id);
        if ($scope != null) {
            $scope->delete();
        }
        return redirect()->route('alcance.index')->with('success', 'Éxito al eliminar.');
    }
}
