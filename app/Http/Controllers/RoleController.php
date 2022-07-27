<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $search_to_word = "";
        if ($request->search) {
            $search_to_word = $request->search;
            $roles = Role::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $roles = Role::paginate(10);
        }
        return view('role.index', compact('roles', 'search_to_word'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'permissions' => 'required|min:1',
        ]);
        $role = Role::firstOrCreate(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        if ($role != null) {
            $permissions = Permission::all();
            return view('role.edit', compact('permissions', 'role'));
        }
    }

    public function update(Request $request, Role $role)
    {
        if ($role != null) {
            $request->validate([
                'name' => ['string'],
                'permissions' => 'required|min:1',
            ]);
            $role->update($request->all());
            $role->permissions()->sync($request->permissions);
            return redirect()->route('roles.index');
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role != null) {
            $role->delete();
            return redirect()->route('roles.index');
        }
    }
}
