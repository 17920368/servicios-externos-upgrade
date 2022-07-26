<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use App\Models\Area;
use App\Models\Classification;
use App\Models\Instance;
use App\Models\Scope;
use App\Models\Sector;
use App\Models\SectorType;
use App\Models\Size;
use Illuminate\Http\Request;

class InstanceController extends Controller
{
    public function index(Request $request)
    {
        $instances = Instance::paginate(10);
        $search_to_word = "";
        if ($request->search) {
            $search_to_word = $request->search;
            $instances = Instance::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        }
        return view('instance.index', compact('instances', 'search_to_word'));
    }

    public function create()
    {
        $scopes = Scope::pluck('name', 'id');
        $sectors = Sector::pluck('name', 'id');
        $sectors_types = SectorType::pluck('name', 'id');
        $sizes = Size::pluck('name', 'id');
        $classifications = Classification::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        return view('instance.create', compact('scopes', 'sectors', 'sectors_types', 'sizes', 'classifications', 'areas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'responsible' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'scope_id' => ['required', 'integer'],
            'sector_id' => ['required', 'integer'],
            'sector_type_id' => ['required', 'integer'],
            'size_id' => ['required', 'integer'],
            'classification_id' => ['required', 'integer'],
            'area_id' => ['required', 'integer'],
        ]);
        $instance = new Instance();
        $instance->name = $request->name;
        $instance->responsible = $request->responsible;
        $instance->email = $request->email;
        $instance->phone = $request->phone;
        $instance->scope_id = $request->scope_id;
        $instance->sector_id = $request->sector_id;
        $instance->sector_type_id = $request->sector_type_id;
        $instance->size_id = $request->size_id;
        $instance->classification_id = $request->classification_id;
        $instance->area_id = $request->area_id;
        $instance->save();
        return redirect()->route('instancia.index')->with('success', 'Éxito al agregar.');
    }
    public function show(Request $request, $id)
    {

        $status = ["Vigente", "Finalizado", "Cancelado"];
        $agreements = Agreement::where('instance_id', '=', $id)->paginate(10);
        // if ($request->search) {
        //     $agreements = Agreement::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        // }
        return view('instance.index-agreement', compact('agreements', 'status', 'id'));
    }
    public function edit($id)
    {
        $scopes = Scope::pluck('name', 'id');
        $sectors = Sector::pluck('name', 'id');
        $sectors_types = SectorType::pluck('name', 'id');
        $sizes = Size::pluck('name', 'id');
        $classifications = Classification::pluck('name', 'id');
        $areas = Area::pluck('name', 'id');
        $instance = Instance::find($id);
        if ($instance != null) {
            return view('instance.edit', compact('instance', 'scopes', 'sectors', 'sectors_types', 'sizes', 'classifications', 'areas'));
        }
    }
    public function update(Request $request, $id)
    {
        $instance = Instance::find($id);
        if ($instance != null) {
            $request->validate([
                'name' => ['required', 'string'],
                'responsible' => ['required', 'string'],
                'email' => ['required', 'email'],
                'phone' => ['required', 'string'],
                'scope_id' => ['required', 'integer'],
                'sector_id' => ['required', 'integer'],
                'sector_type_id' => ['required', 'integer'],
                'size_id' => ['required', 'integer'],
                'classification_id' => ['required', 'integer'],
                'area_id' => ['required', 'integer'],
            ]);
            $instance->name = $request->name;
            $instance->responsible = $request->responsible;
            $instance->email = $request->email;
            $instance->phone = $request->phone;
            $instance->scope_id = $request->scope_id;
            $instance->sector_id = $request->sector_id;
            $instance->sector_type_id = $request->sector_type_id;
            $instance->size_id = $request->size_id;
            $instance->classification_id = $request->classification_id;
            $instance->area_id = $request->area_id;
            $instance->save();
            return redirect()->route('instancia.edit', $id)->with('success', 'Éxito al actualizar.');
        }
    }
    public function destroy($id)
    {
        $instance = Instance::find($id);
        if ($instance != null) {
            $instance->delete();
        }
        return redirect()->route('instancia.index')->with('success', 'Éxito al eliminar.');
    }
}
