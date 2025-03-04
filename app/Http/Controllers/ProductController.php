<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::with('category')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,product_category_id',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'product_color' => 'required|string|max:50',
            'stock_available' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $product = Product::create(array_merge($request->all(), [
            'created_by' => 'admin',
            'created_date' => now(),
        ]));

        return response()->json($product, 201);
    }

    public function show($id)
    {
        return response()->json(Product::with('category')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update(array_merge($request->all(), [
            'last_updated_by' => 'admin',
            'last_updated_date' => now(),
        ]));

        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
