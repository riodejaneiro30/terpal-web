<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StockController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('stock.index', compact('products'));
    }

    public function update(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('stock.index')->with('error', 'Produk tidak ditemukan.');
        }

        $request->validate([
            'stock_available' => 'required|integer|min:0',
        ]);

        $product->update([
            'stock_available' => $request->stock_available,
        ]);

        return redirect()->route('stock.index')->with('success', 'Stok produk berhasil diperbarui.');
    }
}
