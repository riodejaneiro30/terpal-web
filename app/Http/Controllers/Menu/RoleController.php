<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string'
        ]);

        Role::create([
            'role_id' => (string) Str::uuid(), // Generate UUID
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
            'created_by' => auth()->user()->name,
            'created_date' => now(),
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil dibuat.');
    }

    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role_name' => 'required|string|max:255',
            'role_description' => 'required|string',
        ]);

        $role->update([
            'role_name' => $request->role_name,
            'role_description' => $request->role_description,
            'last_updated_by' => auth()->user()->name,
            'last_updated_date' => now(),
        ]);

        return redirect()->route('role.index')->with('success', 'Role berhasil diupdate.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Role berhasil dihapus.');
    }
}
