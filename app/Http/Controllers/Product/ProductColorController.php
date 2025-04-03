<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductColorController extends Controller
{
    // 🟢 Fetch all product colors
    public function index()
    {
        $colors = ProductColor::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('productcolor.index', compact('colors'));
    }

    // 🟢 Show form to create a new color
    public function create()
    {
        return view('productcolor.create');
    }

    // 🟢 Store new color
    public function store(Request $request)
    {
        $request->validate([
            'product_color' => 'required|string|unique:product_colors',
        ]);

        ProductColor::create([
            'product_color_id' => Str::uuid()->toString(),
            'product_color' => $request->product_color,
            'created_by' => auth()->user()->name,
            'created_date' => now(),
        ]);

        return redirect()->route('productcolor.index')->with('success', 'Warna produk berhasil dibuat.');
    }

    // 🟢 Show form to edit color
    public function edit(ProductColor $color)
    {
        return view('productcolor.edit', compact('color'));
    }

    // 🟢 Update color
    public function update(Request $request, ProductColor $color)
    {
        $request->validate([
            'product_color' => 'required|string|unique:product_colors',
        ]);

        $color->update([
            'product_color' => $request->product_color,
            'last_updated_by' => auth()->user()->name,
            'last_updated_date' => now(),
        ]);

        return redirect()->route('productcolor.index')->with('success', 'Warna produk berhasil diperbarui.');
    }

    // 🟢 Delete color
    public function destroy(ProductColor $color)
    {
        $color->delete();
        return redirect()->route('productcolor.index')->with('success', 'Warna produk berhasil dihapus.');
    }
}
