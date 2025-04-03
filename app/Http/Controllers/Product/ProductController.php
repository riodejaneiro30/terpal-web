<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('product.index', compact('products'));
    }


    public function detail(Product $product)
    {
        return view('product.detail', compact('product'));
    }

    public function create()
    {
        $categories = ProductCategory::all();
        $colors = ProductColor::all();
        return view('product.create', compact('categories', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_category_id' => 'required|exists:product_categories,product_category_id',
            'color_id' => 'required|exists:product_colors,product_color_id',
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

        $data['product_id'] = (string) Str::uuid();
        $data['created_by'] = 'admin';
        $data['created_date'] = now();
        Product::create($data);
        
        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $colors = ProductColor::all();
        return view('product.edit', compact('product', 'categories', 'colors'));
    }

    public function update(Request $request, Product $product)
    {
        if (Auth::user()->profile && Auth::user()->profile->role && Auth::user()->profile->role->role_name == 'Owner') {
            $request->validate([
                'product_name' => 'required|string|max:255',
                'product_category_id' => 'required|exists:product_categories,product_category_id',
                'color_id' => 'required|exists:product_colors,product_color_id',
                'stock_available' => 'required|integer',
                'price' => 'required|numeric',
                'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
            ]);
        }
        
        $imageData = null;

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageData = base64_encode(file_get_contents($image));
        }
        else {
            $imageData = $product->product_image;
        }

        $product->update([
            'product_name' => $request->product_name ? $request->product_name : $product->product_name,
            'product_description' => $request->product_description ? $request->product_description : $product->product_description,
            'product_category_id' => $request->product_category_id ? $request->product_category_id : $product->product_category_id,
            'width' => $request->width ? $request->width : $product->width,
            'length' => $request->length ? $request->length : $product->length,
            'color_id' => $request->color_id ? $request->color_id : $product->color_id,
            'stock_available' => $request->stock_available ? $request->stock_available : $product->stock_available,
            'price' => $request->price ? $request->price : $product->price,
            'product_image' => $imageData ? $imageData : $product->product_image,
            'net_price' => $request->net_price ? $request->net_price : $product->net_price,
            'min_stock' => $request->min_stock ? $request->min_stock : $product->min_stock,
            'last_updated_by' => Auth::user()->name,
            'last_updated_date' => now(),
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }
}
