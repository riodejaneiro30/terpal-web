<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $productGroupByCategory = ProductCategory::withCount('products')->get();
        $totalProducts = Product::count();

        return view('dashboard.index', compact('productGroupByCategory', 'totalProducts'));
    }
}
