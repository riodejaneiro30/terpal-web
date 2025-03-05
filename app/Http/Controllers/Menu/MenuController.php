<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_description' => 'required|string'
        ]);

        Menu::create([
            'menu_id' => (string) Str::uuid(), // Generate UUID
            'menu_name' => $request->menu_name,
            'menu_description' => $request->menu_description,
            'created_by' => 'admin',
            'created_date' => now(),
        ]);

        var_dump($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'menu_name' => 'required|string|max:255',
            'menu_description' => 'required|string',
        ]);

        $menu->update([
            'menu_name' => $request->menu_name,
            'menu_description' => $request->menu_description,
            'last_updated_by' => 'admin',
            'last_updated_date' => now(),
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu updated successfully.');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu deleted successfully.');
    }
}
