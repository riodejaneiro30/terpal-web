<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductCategory::all();

        $products = Product::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = strtolower($request->search);
            $products->whereRaw('LOWER(product_name) LIKE ?', ['%' . $searchTerm . '%']);
        }

        if ($request->has('categories') && !empty($request->categories)) {
            $products->whereIn('product_category_id', $request->categories);
        }

        if ($request->has('types') && !empty($request->types)) {
            $products->whereIn('type', $request->types);
        }

        if ($request->has('product_color') && $request->product_color != '') {
            $products->whereRaw('LOWER(product_color) LIKE ?', ['%' . $request->product_color . '%']);
        }

        if ($request->has('min_price') && $request->min_price != '') {
            $products->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price != '') {
            $products->where('price', '<=', $request->max_price);
        }

        $products = $products->orderBy('created_date', 'desc')->get();

        return view('catalog.index', compact('products', 'categories'));
    }
}
