<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuRole;
use App\Models\Role;

class MenuRoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('menurole.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        $menuRoles = $role->menus;

        
        $roleId = $role->role_id;
        $menus = Menu::whereNotIn('menu_id', function ($query) use ($roleId) {
            $query->select('menu_id')
                  ->from('menu_roles')
                  ->where('role_id', $roleId);
        })
        ->get();

        return view('menurole.edit', compact('role', 'menus', 'menuRoles'));
    }

    public function store(Request $request, $role_id)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,menu_id',
        ]);

        MenuRole::create([
            'role_id' => $role_id,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->back()->with('success', 'Menu telah diberikan ke role.');
    }

    public function destroy($role_id, $menu_id)
    {
        // Find and delete the menu_role entry
        MenuRole::where('role_id', $role_id)
            ->where('menu_id', $menu_id)
            ->delete();

        return redirect()->back()->with('success', 'Menu role berhasil dihapus.');
    }
}
