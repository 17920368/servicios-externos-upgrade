<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $roles = Role::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $roles = Role::paginate(10);
        }
        return view('role.index', compact('roles'));
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
        /* -------------------------------------------------------------------------- */
        /*                              Initial Validate                              */
        /* -------------------------------------------------------------------------- */
        $permissions = Permission::all();
        return view('role.edit', compact('permissions', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => ['string'],
            'permissions' => 'required|min:1',
        ]);
        /* -------------------------------------------------------------------------- */
        /*                              Initial Validate                              */
        /* -------------------------------------------------------------------------- */
        if ($role == null) {
            return view('errors.4032');
        }
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        /* -------------------------------------------------------------------------- */
        /*                              Initial Validate                              */
        /* -------------------------------------------------------------------------- */
        $role->delete();
        return redirect()->route('roles.index');
    }
}
