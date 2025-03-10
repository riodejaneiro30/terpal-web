<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        $categories = ProductCategory::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,product_category_id',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'product_color' => 'required|string|max:255',
            'stock_available' => 'required|integer',
            'price' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
        ]);

        $data = $request->all();

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageData = base64_encode(file_get_contents($image));

            $data['product_image'] = $imageData;
        }

        //$data['created_by'] = auth()->user()->name; // Set the created_by field
        $data['created_by'] = 'admin';
        $data['created_date'] = now();
        Product::create($data);
        
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan.');
    }
}
