<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    // 🟢 Fetch all product categories
    public function index()
    {
        $categories = ProductCategory::orderBy('created_date', 'desc')->paginate(10); // Paginate with 10 items per page
        return view('productcategory.index', compact('categories'));
    }

    // 🟢 Show form to create a new category
    public function create()
    {
        return view('productcategory.create');
    }

    // 🟢 Store new category
    public function store(Request $request)
    {
        $request->validate([
            'product_category_name' => 'required|string|unique:product_categories',
        ]);

        ProductCategory::create([
            'product_category_id' => Str::uuid()->toString(),
            'product_category_name' => $request->product_category_name,
            'created_by' => auth()->user()->name,
            'created_date' => now(),
        ]);

        return redirect()->route('productcategory.index')->with('success', 'Kategori produk berhasil dibuat.');
    }

    // 🟢 Show form to edit category
    public function edit(ProductCategory $category)
    {
        return view('productcategory.edit', compact('category'));
    }

    // 🟢 Update category
    public function update(Request $request, ProductCategory $category)
    {
        $request->validate([
            'product_category_name' => 'required|string|unique:product_categories,product_category_name,' . $category->product_category_id . ',product_category_id',
        ]);
        
        $category->update([
            'product_category_name' => $request->product_category_name,
            'last_updated_by' => auth()->user()->name,
            'last_updated_date' => now(),
        ]);
        
        return redirect()->route('productcategory.index')->with('success', 'Kategori produk berhasil diupdate.');
    }

    // 🟢 Delete category
    public function destroy(ProductCategory $category)
    {
        $category->delete();
        return redirect()->route('productcategory.index')->with('success', 'Kategori produk berhasil dihapus.');
    }
}
