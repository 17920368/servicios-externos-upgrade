<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search_to_word = "";
        if ($request->search) {
            $search_to_word = $request->search;
            $users = User::where('name', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $users = User::paginate(10);
        }
        return view('user.index', compact('users', 'search_to_word'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'roles' => 'required|min:1|max:1'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // $user->roles()->attach($request->roles);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $roles = Role::all();
            return view('user.edit', compact('user', 'roles'));
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user != null) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                ],
                'password' => ['required', 'string', 'min:8'],
                // 'roles' => 'required|min:1'
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            // $user->roles()->sync($request->roles);
            return redirect()->route('users.index');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user != null) {
            $user->delete();
            return redirect()->route('users.index');
        }
    }
}
